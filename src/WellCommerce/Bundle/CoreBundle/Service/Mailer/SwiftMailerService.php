<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CoreBundle\Helper\Mailer;

use Swift_Mailer as Mailer;
use Swift_Message as Message;
use Swift_Plugins_LoggerPlugin;
use Swift_Plugins_Loggers_EchoLogger;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WellCommerce\Bundle\AppBundle\Entity\MailerConfiguration;
use WellCommerce\Bundle\CoreBundle\DependencyInjection\AbstractContainerAware;
use WellCommerce\Bundle\ShopBundle\Storage\ShopStorageInterface;

/**
 * Class MailerHelper
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class MailerHelper extends AbstractContainerAware implements MailerHelperInterface
{
    /**
     * @var array
     */
    private $options = [];
    
    /**
     * @var bool
     */
    private $debug;
    
    /**
     * @var ShopStorageInterface
     */
    private $shopStorage;
    
    /**
     * MailerHelper constructor.
     *
     * @param bool                 $debug
     * @param ShopStorageInterface $shopStorage
     */
    public function __construct(bool $debug = false, ShopStorageInterface $shopStorage)
    {
        $this->debug       = $debug;
        $this->shopStorage = $shopStorage;
    }
    
    public function sendEmail(array $options) : int
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $this->options = $resolver->resolve($options);
        
        $mailer  = $this->createMailer();
        $message = $this->createMessage();
        
        return $mailer->send($message);
    }
    
    protected function createMessage() : Message
    {
        $message = Message::newInstance();
        $message->setSubject($this->options['subject']);
        $message->setFrom($this->options['configuration']->getFrom());
        $message->setTo($this->options['recipient']);
        $message->setReplyTo($this->options['reply_to']);
        $message->setBcc($this->options['bcc']);
        
        $this->setBody($message, $this->options['template'], $this->options['parameters']);
        
        return $message;
    }
    
    protected function setBody(Message $message, string $template, array $parameters = [])
    {
        $parameters['message'] = $message;
        $body                  = $this->getTemplatingHelper()->render($template, $parameters);
        
        $message->setBody($body, 'text/html');
    }
    
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired([
            'recipient',
            'bcc',
            'reply_to',
            'subject',
            'template',
            'parameters',
            'configuration',
        ]);
        
        $resolver->setDefault('bcc', function (Options $options) {
            return $options['configuration']->getFrom();
        });
        
        $resolver->setDefault('reply_to', function (Options $options) {
            return $options['configuration']->getFrom();
        });
        
        $resolver->setNormalizer('subject', function (Options $options) {
            return $this->getTranslatorHelper()->trans($options['subject']);
        });
        
        $resolver->setAllowedTypes('recipient', ['string', 'array']);
        $resolver->setAllowedTypes('bcc', ['string', 'array']);
        $resolver->setAllowedTypes('reply_to', ['string', 'array']);
        $resolver->setAllowedTypes('subject', ['string']);
        $resolver->setAllowedTypes('template', ['string']);
        $resolver->setAllowedTypes('parameters', ['array']);
        $resolver->setAllowedTypes('configuration', MailerConfiguration::class);
    }
    
    protected function createMailer() : Mailer
    {
        $configuration = $this->options['configuration'];
        $transport     = new \Swift_SmtpTransport($configuration->getHost(), $configuration->getPort(), 'tls');
        $transport->setUsername($configuration->getUser());
        $transport->setPassword($configuration->getPass());
        $transport->setStreamOptions([
            'ssl' => [
                'verify_peer' => false
            ]
        ]);
        
        $mailer = Mailer::newInstance($transport);
        
        if ($this->debug) {
            $logger = new Swift_Plugins_Loggers_EchoLogger();
            $mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));
        }
        
        return $mailer;
    }
}
