const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      minimumFractionDigits: 0,
    }).format(number);
  }

$(document).ready(function () {

    var items = [];
    var quantity = 0;
    var total = 0;
    let _cartContainer = $('.cart-container');
    if(localStorage.getItem('ordered-product')){
        const orderedProd = JSON.parse(localStorage.getItem('ordered-product'));
        quantity++;
        total += orderedProd.price;
        items.push({...orderedProd, qty:1, total: orderedProd.price});
        $('#order').val(orderedProd.id);
        _cartContainer.empty()
        $('.notif').removeClass('d-none');
        $('.notif').find('.quantity').text(quantity);
        $('.quantity').removeClass('d-none');
        $('.quantity').text(quantity);
        $('.display').removeClass('d-none');
        $('.display').find('.total-harga').text(rupiah(total))
        items.map((item) => {
            let _elCartItem = $('.card-template.d-none').clone().removeClass('d-none');
            _elCartItem.find('.product-name').text(item.name);
            _elCartItem.find('.item-qty').text(item.qty);
            _elCartItem.find('.total-price').text(rupiah(item.total));
            _elCartItem.find('.product-img').attr('src', `https://jualhebel.shop/storage/`+ item.image +``);
            _elCartItem.find('.remove').attr('data-product', JSON.stringify(item.id));
            _elCartItem.find('.add').attr('data-product', JSON.stringify(item.id));
            _cartContainer.append(_elCartItem);
        })
        localStorage.removeItem('ordered-product')
        $('#order').val(JSON.stringify(items));
    }
    $('.add-item').click(function () {
        let cartItem = $(this).data('product');
        let id = cartItem.id;
        if (!items.some(item => item.id === id)) {
            items.push({...cartItem, qty:1, total: cartItem.price});
            quantity++;
            total += cartItem.price; 

        } else {
            items.map((item)=>{
                if (item.id !== id) {
                    return item;
                } else {
                    item.qty++;
                    item.total = item.qty * item.price;
                    quantity++;
                    total += item.price;
                }
            })
        }
        $('#order').val(JSON.stringify(items));
        _cartContainer.empty()

        $('.notif').removeClass('d-none');
        $('.notif').find('.quantity').text(quantity);
        $('.quantity').removeClass('d-none');
        $('.quantity').text(quantity);
        $('.display').removeClass('d-none');
        $('.display').find('.total-harga').text(rupiah(total))
        items.map((item) => {
            let _elCartItem = $('.card-template.d-none').clone().removeClass('d-none');
            _elCartItem.find('.product-name').text(item.name);
            _elCartItem.find('.item-qty').text(item.qty);
            _elCartItem.find('.total-price').text(rupiah(item.total));
            _elCartItem.find('.product-img').attr('src', `https://jualhebel.shop/storage/`+ item.image +``);
            _elCartItem.find('.remove').attr('data-product', JSON.stringify(item.id));
            _elCartItem.find('.add').attr('data-product', JSON.stringify(item.id));
            _cartContainer.append(_elCartItem);
            
        })
    })

    $('.cart-container').on('click','.add', function() {
        let id = $(this).data('product');
        
        items.map((item) => {
            if (item.id !== id) {
                return item;
            } else {
                item.qty++;
                item.total = item.qty * item.price;
                total += item.price;
                quantity++;
            }
        })

        $('#order').val(JSON.stringify(items));
        _cartContainer.empty()

        $('.notif').removeClass('d-none');
        $('.notif').find('.quantity').text(quantity);
        $('.quantity').removeClass('d-none');
        $('.quantity').text(quantity);
        $('.display').removeClass('d-none');
        $('.display').find('.total-harga').text(rupiah(total))
        items.map((item) => {
            let _elCartItem = $('.card-template.d-none').clone().removeClass('d-none');
            _elCartItem.find('.product-name').text(item.name);
            _elCartItem.find('.item-qty').text(item.qty);
            _elCartItem.find('.total-price').text(rupiah(item.total));
            _elCartItem.find('.product-img').attr('src', `https://jualhebel.shop/storage/`+ item.image +``);
            _elCartItem.find('.remove').attr('data-product', JSON.stringify(item.id));
            _elCartItem.find('.add').attr('data-product', JSON.stringify(item.id));
            _cartContainer.append(_elCartItem);

        })

    })

    $('.cart-container').on('click','.remove', function() {
        let id = $(this).data('product');
        let newItem = items.find((item) => item.id === id)
        
        if (newItem.qty > 1) {
            items.map((item) => {
                if (item.id !== id) {
                    return item;
                } else {
                    item.qty--;
                    item.total = item.price * item.qty;
                    quantity--;
                    total -= item.price;
                    return item;
                }
            })
        } else if(newItem.qty === 1) {
            items = items.filter((item) => item.id !== id);
            quantity--;
            total -= newItem.price;;
        }

        $('#order').val(JSON.stringify(items));
        _cartContainer.empty()

        $('.notif').removeClass('d-none');
        $('.notif').find('.quantity').text(quantity);
        $('.quantity').removeClass('d-none');
        $('.quantity').text(quantity);
        $('.display').removeClass('d-none');
        $('.display').find('.total-harga').text(rupiah(total))
        items.map((item) => {
            let _elCartItem = $('.card-template.d-none').clone().removeClass('d-none');
            _elCartItem.find('.product-name').text(item.name);
            _elCartItem.find('.item-qty').text(item.qty);
            _elCartItem.find('.total-price').text(rupiah(item.total));
            _elCartItem.find('.product-img').attr('src', `https://jualhebel.shop/storage/`+ item.image +``);
            _elCartItem.find('.remove').attr('data-product', JSON.stringify(item.id));
            _elCartItem.find('.add').attr('data-product', JSON.stringify(item.id));
            _cartContainer.append(_elCartItem);
        })

        if (!items.length) {
            $('.notif').addClass('d-none');
            $('.quantity').addClass('d-none');
            $('.display').addClass('d-none');
        }

    })
    

})





