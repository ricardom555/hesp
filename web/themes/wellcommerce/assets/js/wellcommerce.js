$(document).ready(function () {

    var oBasketModal = $('#basket-modal');
    var oCartPreview = $('#topCart');

    $('.add-cart').GProductAddCartButton({
        oBasketModal: oBasketModal,
        oCartPreview: oCartPreview,
        sAddProductFormClass: '.add-to-cart',
        sProductSelector: '#product',
        sQuantitySelector: '#quantity',
        sAttributeSelector: '#attribute',
        sPriceSelector: '#price',
        sAddProductRoute: 'front.cart.add',
        sAttributesSelectClass: '.attribute'
    });

    $('.coming-soon').click(function(e){
        e.stopImmediatePropagation();
        $('#coming-soon-modal').modal('show');
        return false;
    });

    $('.cart').GCart({
        sChangeQuantityRoute: 'front.cart.edit',
        sQuantitySpinnerClass: 'quantity-spinner'
    });

    $('.cart .coupon').GCoupon({
        sAddCouponRoute:      'front.coupon.add',
        sRemoveCouponRoute:      'front.coupon.delete',
        sCodeInputIdentifier: 'coupon_code',
        sAddButtonIdentifier: 'use_coupon',
        sRemoveButtonIdentifier: 'remove_coupon'
    });

	$('.push-search, .sliding-search > div').click(function() {
		$('body').toggleClass('sliding-search-is-open');
	});

	 $('.sliding-search > div > form').click(function(event){
	     event.stopPropagation();
	 });

    $('.push-hamburger').click(function() {
		$('body').toggleClass('hamburger-is-open');
	});

	$('.modal').prependTo('body');
});
