var app = {

  fecther: function(){
    $("input.search").focus();

    $("#querySelector").on("keyup", function(e){

        $.getJSON('/api/search/'+ $("#querySelector").val())

        .done(function(response) {

            var output = '';
            console.log(response.data);
            $.each(response.data.products, function(key, val){

                output += '<li id="' + val.id + ' " data-product-id=" ' + val.id + ' " data-product = "' + val.name + '" data-price = "' + val.price + '" data-unit = "' + val.unit + '" data-img = "' + val.img + '">';
                output += '<div class="clearfix pos-rel">'+
                      '<span class="pull-left products pos-abs">' + val.name + '</span>'+
                      '<span class="pull-right price">&#8358;' + val.price + '</span><br>'+
                      '<small class="pull-right">' + val.unit + '</small>'+
                  '</div>';
                output += '</li>';
            });
            //output += '</ul>';

          $("#overscroll").html(output);

        }).fail(function() {
            var searchField = $("#querySelector").val();

            // var myExp = new RegExp(searchField, 'i');

            // var output = '<ul class="suggestions">';
            // $.each(dataLog, function(key, val){

            //   if((val.unit.search(myExp) != -1) || (val.product.search(myExp) != -1)) {

            //       output += `<li id="${val.id}" data-product-id="${val.id}" data-product = "${val.product}" data-price = "${val.price}" data-unit = "${val.unit}" data-img = "${val.img}">`;
            //       output += `<div class="clearfix pos-rel">
            //                     <span class="pull-left products pos-abs">${val.product}</span>
            //                     <span class="pull-right price">&#8358; ${val.price}</span><br>
            //                     <small class="pull-right">${val.unit}</small>
            //                 </div>`;
            //       output += "</li>";
            //   }

            // });
            // output += '</ul>';

            if(searchField.length === 0){
              output = "";
            }
            $("#overScroll").html(output);
        }).always(function(){

          $('.loading').hide();
        });
    });
  },
  cartCtrl: function(){
    var cart = [];

    //function that returns objects
    function Item (name, price, count, unit, img, product_id){
      this.name = name;
      this.price = price;
      this.count = count;
      this.unit = unit;
      this.img = img;
      this.id = product_id
    }

    //addItemToCart(name, price, count)
    function addItemToCart(name, price, count, unit, img, product_id){
      // console.log(unit);
      var item = new Item(name, price, count, unit, img, product_id);

      saveCartItem(item);
    }

    //removeItemFromCart(name) from the cart, just one item
    function removeItemFromCart(cart_item_id, inc_dec = true){
      var action = 'subtract';

      $.getJSON('/cart/update/' + cart_item_id + '/' + action).done(function () {
         displayCart(inc_dec);
      })
      // for(var i in cart){
      //   if(cart[i].name === name){
      //     cart[i].count--;
      //     if(cart[i].count === 0){
      //       cart.splice(i, 1);
      //     }
      //     break;
      //   }
      // }
      // saveCart();
    }

    //removeItemFromCartAll, all items....
    function removeItemFromCartAll(cart_item_id){
      $.getJSON('/cart/delete/' + cart_item_id ).done(function () {
         displayCart();
      });
    }

    //clear cart
    function clearCart(){
      cart = [];
      saveCart();
    }

    //return total count in the cart
    function countCart(){
      var totalCount = 0;
      for(var i in cart){
        totalCount += cart[i].count;
      }
      return totalCount;
    }

    //return total cost
    function totalCart(){
      var totalCost = 0;
      for(var i in cart){
        totalCost += cart[i].price * cart[i].count;
      }
      return totalCost;
    }

    //listCart return array[] of items
    function listCart(){
      var cartCopy = [];

      for(var i in cart){
        var item = cart[i];
        var itemCopy = {};
        for(var p in item){
          itemCopy[p] = item[p];
        }
        cartCopy.push(itemCopy);
      }

      return cartCopy;
    }

    //save cart.............
    function saveCart(){
      localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    //load the cart
    function loadCart(){
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
    }

    //calculates service charges here....
    function serviceChargeCtrl(percent, total_cost){
      serviceCharge = 0;
      serviceCharge = (percent/100) * total_cost;
      return serviceCharge;
    }

    //calculates service charges here....
    function deliveryCtrl(dvFee){
      return dvFee;
    }

    function a(){
      $(".empty_bag").fadeIn("slow");
      $(".full_bag").fadeOut("slow");
    }

    function b(){
      $(".full_bag").fadeIn("slow");
       $(".empty_bag").fadeOut("fast");
    }


    //function that animates counter
    function aniCounter(){
      setTimeout(function(){
          $(".items").addClass("shakers");
      }, 50);
      $(".items").removeClass("shakers");
    }

    //round to two...
    function roundToTwo(num) {
        return +(Math.round(num + "e+2")  + "e-2");
    }


    //display items in cart
    function displayCart(isRun = true){
      if(isRun){
        $("#loader").show();
        $.getJSON('/cart').done(function(response){

            var output = "";
            var output2 = "";
            var totalCount = 0;
            var total_cost = 0;

            $.each(response.data.cart, function(key, val){
              // console.log(val.options.img

              output += '<li class="pos-rel animated"' + 'data-product="' + val.name + '"' +  'id="pr_' + val.name+ '">'+
                            '<div class="row">'+
                                '<div class="col-xs-6">'+
                                    '<div class="row">'+
                                        '<div class="col-xs-5 p-r-0">'+
                                            '<div class="thumbnail">'+
                                                '<img src="' + val.options.img + '">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xs-7 p-l-0">'+
                                            '<div class="pr-text">'+
                                                '<h4 class="m-b-0 m-t-5">' + val.name + '</h4>'+
                                                '<small>' + val.options.unit + '</small>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-xs-3 p-l-0">'+
                                    '<div class="counter">'+
                                        '<div class="minus" data-price = "'+ val.price + '" data-product="' + val.name + '" data-cart-item-id="'+ key+ '">-</div>'+
                                        '<div class="count">' + val.qty + '</div>'+
                                        '<div class="plus" data-price = "' + val.price+ '" data-product="' + val.name + '" data-cart-item-id="' + key+ '">+</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-xs-3">'+
                                    '<h4 class="m-b-0 m-t-5">&#8358;' + roundToTwo(val.price).toLocaleString() + '</h4>'+
                                '</div>'+
                            '</div>'+
                            '<span class="fa fa-trash pos-abs" data-product="'+ val.name+ '" data-cart-item-id="' + key + '"></span>'+
                        '</li>';

             output2 += '<tr class="p-t-14 width-33_3p" data-product="' + val.name + '" id="pr_' + val.name + '">'+
                            '<td class="">'+
                                '<div class="clearfix">'+
                                    '<div class="f-left p-r-15">'+
                                        '<img src="' + val.options.img + '" class="width-40 h-40 bd-50p">'+
                                    '</div>'+
                                    '<div class="f-left">'+
                                        '<div>' + val.name + '</div>'+
                                        '<div class="f-12 opacity-50">' + val.options.unit + '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td class="width-33_3p">'+
                                '<div class="counter text-center p-t-0">'+
                                    '<div class="minus" data-price = "' + val.price + '" data-cart-item-id="' + key + '">-</div>'+
                                    '<div class="count">' + val.qty + '</div>'+
                                    '<div class="plus" data-price = "' + val.price + '" data-cart-item-id="' + key + '">+</div>'+
                                '</div>'+
                            '</td>'+
                            '<td class="p-t-14 width-33_3p text-right">'+
                                '<div class="w-600 p-r-12">'+
                                    '₦ <span class="cash">' + roundToTwo(val.price).toLocaleString() + '</span>'+
                                '</div>'+
                                '<button class="btn bg-transparent-black opacity-50 f-12 removeItem" data-cart-item-id="' + key + '">REMOVE</button>'+
                            '</td>'+
                        '</tr>';

              totalCount += val.qty;
             
              total_cost += val.subtotal;
              // console.log(val.subtotal);

          });
          total_cost =  roundToTwo(total_cost);
          // console.log(total_cost);
          total_cost === 0 ? a() : b();
            for (var i = 0; i < response.data.charges.length; i++) {

               if(response.data.charges[i].name == "Delivery fee"){
                 var delivery_fee = deliveryCtrl(response.data.charges[i].fixed_amount);
                 $("#deliveryFee").html(roundToTwo(delivery_fee).toLocaleString());

               }

               if(response.data.charges[i].name == "Service Charge"){
                 var service_charge = serviceChargeCtrl(response.data.charges[i].percentage, total_cost);
                 service_charge = roundToTwo(service_charge);
                 $("#serviceCharge").html(service_charge.toLocaleString());
               }

            }


            $("#basketList").html(output);

            $(".items").html(totalCount);

            // console.log(total_cost.toLocaleString());//16,200

            $("#totalP").html(total_cost.toLocaleString());
            $("#cartTable").html(output2);

            $("#grandTP").html((total_cost + service_charge + delivery_fee).toLocaleString('en-NG'));
            $('#loader').hide();
        })
        .fail(function() {
            setTimeout(function() {
              $('#loader').hide();

                }, 5000);
            });
      }
    }



    function saveCartItem(item){

      postData = item
        $.post('/cart/add', postData).done( function (data) {
          displayCart();
        })
    }

    function updateCartItem(cart_id, inc_dec = false) {
       var action = 'addition';

      $.getJSON('/cart/update/' + cart_id + '/' + action).done(function () {
         displayCart(inc_dec);
      }).fail(function(error) {
          // console.log(error);
      })
    }





    $(document).on('click', '.suggestions li', function(e){
        e.preventDefault();

      //open cart if width is big enough...
        if($(window).width() >= 768){
          $("html").addClass("open");
        }
       //name, price, and count
        var name = $(this).attr("data-product");
        var price = $(this).attr("data-price");
        var unit = $(this).attr("data-unit");
        var img = $(this).attr("data-img") || 'assets/img/avatar.png';
        var product_id = $(this).attr("data-product-id");
        addItemToCart(name, price, 1, unit, img, product_id);
        // displayCart();
        aniCounter();
        e.stopImmediatePropagation();
        // Pepsi-Can-01/mURTfEcPm67gLv7oeSXw9tK5Ef59Yts7Q5gcbZB4.jpeg
    });

    //remove items from cart
    $(document).on('click', 'li .fa-trash', function(){
      var id = $(this).attr('data-cart-item-id');
      removeItemFromCartAll(id);

    });

    $(document).on('click', '.counter .plus', function(){

      var name = $(this).attr('data-product');
      var price = parseFloat($(this).attr('data-price'));

      var total = $("#totalP").html();
      total = parseFloat(total.replace(/[^0-9-.]/g, ''));
      total += price;

      $("#totalP").html(total.toLocaleString());

      var service_charge = serviceChargeCtrl(10, total);
      $("#serviceCharge").html(service_charge.toLocaleString());


      var delivery_fee = parseFloat($("#deliveryFee").html());

      var grandTP = total + service_charge + delivery_fee;

      $("#grandTP").html(grandTP.toLocaleString());

      var cart_item_id = $(this).attr('data-cart-item-id');

      var count_value = parseInt($(this).prev().text()) + 1;
      $(this).prev().text(count_value);

      var item = parseInt($(".items").html()) + 1;
      $(".items").html(item);

      updateCartItem(cart_item_id, delta = false);
    });

    $(document).on('click', '.counter .minus', function(){
      var id = $(this).attr('data-cart-item-id');
      var price = parseFloat($(this).attr('data-price'));

      var total = $("#totalP").html();
      total = parseFloat(total.replace(/[^0-9-.]/g, ''));
      total -= price;

      $("#totalP").html(total.toLocaleString());

      var service_charge = serviceChargeCtrl(10, total);
      $("#serviceCharge").html(service_charge.toLocaleString());


      var delivery_fee = parseFloat($("#deliveryFee").html());

      var grandTP = total + service_charge + delivery_fee;

      $("#grandTP").html(grandTP.toLocaleString());

      var count_value = parseInt($(this).next().text()) - 1;

      var item = parseInt($(".items").html()) - 1;
      $(".items").html(item);

      $(this).next().text(count_value);
      if(count_value > 0){
        removeItemFromCart(id, false);
      }
      else{
        removeItemFromCart(id);
      }

    });

    $(document).on('click', '.removeItem', function(){
      var id = $(this).attr('data-cart-item-id');
      removeItemFromCartAll(id);
    });


    saveCart();
    loadCart();
    displayCart();

  },

  radioChooser: function(para){
     $(document).find("input[type='radio']").on('change', function(){
      $(document).find("." + para).removeClass("" + para);
      $(document).find(".fa-check-circle-o").hide();
       $(this).parent().addClass(""+ para);
       $(this).parent().find(".fa-check-circle-o").show();
    });
  },
  buttonChooser: function(){
    $("table").find("input[type='radio']").on("change", function(){
        $("table").find(".bg-gray-light").removeClass("bg-gray-light");
        $(this).parents("tr").addClass("bg-gray-light");

    });
  },
  validator: function(){
    //console.log($("#addressForm").parsley().isValid());
    var form = $("#addressForm");
    if( form.parsley().isValid()){
      $("#submit").prop('disabled', false);
    }
    else{
      $("#submit").prop('disabled', 'disabled');
    }
  },
  contentEditor: function(){
    var editBtn = $('#editBtn');
    var editor = $('#editor');
    var receiverNo = $('#receiverNo');

    editBtn.on('click', function(e) {
      e.preventDefault();

        if (!editor[0].isContentEditable) {
            // console.log(editor);
            editor[0].contentEditable = true;
            editor[0].focus();
            editBtn.text('Save');
            editBtn.css('backgroundColor', '#6F9');
        } else {

            editor[0].contentEditable = false;
            // Change Button Text and Color
            editBtn.text('Edit');
            editBtn.css('backgroundColor', '#F96');

            receiverNo.val(editor[0].innerHTML);

        }
    });
  },
  contentEditor2: function(){
    var editBtns = $('.editBtn');

    editBtns.on('click', function(){


      var editor = $(this).parent()[0].previousElementSibling.lastElementChild;

      if (!editor.isContentEditable) {
           // console.log(editor);
            editor.contentEditable = true;
            editor.focus();
            $(this).text('Save');

        } else {
            editor.contentEditable = false;
            new_address = editor.innerHTML;
            postData = {address: new_address}
            var id = $(this).data("payload");

            $.post("/addresses/"+id+"/update", postData, function (response) {
              if(response.status == "done"){
                location.reload();
              }
            });

            // Change Button Text and Color
            $(this).text('Edit');
        }
  });

},
selectDeliveryDate: function () {
  $('.delivery_date').on('click', function ( ) {
      var option = $(document).find("input[type='radio']");
      //get unselect previously selected radio button
      $("input:radio").attr("checked", false);
      $("input:radio").removeAttr("checked");
      var delivery_date = $(this).data("payload");
      $(".delivery_date_v").val(delivery_date);
  });
},
  inlineEditor: function(){

    var editBtn = $('.change');
    /*var editor = editBtn.parents("td");
    console.log(editor);*/

    editBtn.on('click', function(e) {
       //console.log($(this).parent());
        e.preventDefault();

       var editor = $(this).parent()[0].previousElementSibling.firstElementChild;

       if(editor.disabled){
         editor.disabled = false;
         $(this).text('Save');
       }
       else{
         editor.disabled = true;
         $(this).text('Change');
       }
    });

  },
  preventFormSubmit: function(){
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  },

   toggleSidebars: function(){
    $(".cart_toggle").on("click", function(){
        $("html").removeClass("open_left");
        $("html").toggleClass("open");
    });

    $(".menu_toggle").on("click", function(){
        $("html").removeClass("open");
        $("html").toggleClass("open_left");
    });
  },
  numberWithCommas: function (x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  },
   toggleCollapse: function(){
		var mores = Array.from(document.querySelectorAll(".mores"));

	  var tables = Array.from(document.querySelectorAll(".tables"));

		//textcontent varaible;
		var texts;
		//css display properties block and none...
		var c, d;

		//boolean to control toggle function....
		var booled = true;

		//first function to show more
		function showMore(){
			c = "none"; d = "block";
			texts = "Show Full Receipt";
			booled = false;
		}
		//second function that show less
		function showLess(){
			 c = "block"; d = "none";
			 texts = "Hide Full Receipt";
			 booled = true;
		}
		//interestHandler handles toggling between first and second function
		function moreHandler(){
				// console.log(this.textContent);

				booled ? showMore() : showLess();
				//change button textcontent..
				this.textContent = texts;
				//hide less part or show it instead...
				tables[mores.indexOf(this)].querySelector('tbody').style.display = c;

		}

		mores.forEach(function(more){
			 more.addEventListener('click', moreHandler);
		});
	},
  //move navbar content and sidebar into right bar content.....
  sidebarCtrl: function(){
      var navbar_initialized = false,
      misc = {
          navbar_menu_visible: 0
      },
      initRightMenu =  function(){
          if(!navbar_initialized){
              $navbar = $('nav').find('.navbar-collapse').first().clone(true);
              //console.log($navbar);

              $sidebar = $('.page-sidebar');

              //undefined
              sidebar_color = $sidebar.data('color');

              ul_content = '';


              // add the content from the sidebar to the right menu
              content_buff = $sidebar.find('.page-sidebar-menu').html();
             // console.log(content_buff);
              ul_content = ul_content + content_buff;

              //add the content from the regular header to the right menu
             /* $navbar.children('ul').each(function(){
                  content_buff = $(this).html();
                  ul_content = ul_content + content_buff;
              });*/

              ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';

              // console.log(ul_content);
              //navbar_content = ul_content;

              //$navbar.html(navbar_content);

             $('.left_sidebar').append(ul_content);




              $toggle = $('.menu_toggle');

              $navbar.find('a').removeClass('btn btn-round btn-default');
              $navbar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
              $navbar.find('button').addClass('btn-simple btn-block');

              $toggle.click(function (){
                  if(misc.navbar_menu_visible == 1) {
                      $('html').removeClass('nav-open');
                      misc.navbar_menu_visible = 0;
                      $('#bodyClick').remove();
                      setTimeout(function(){
                          $toggle.removeClass('toggled');
                      }, 400);

                  } else {
                      setTimeout(function(){
                          $toggle.addClass('toggled');
                      }, 430);

                      div = '<div id="bodyClick"></div>';
                      $(div).appendTo("body").click(function() {
                          $('html').removeClass('nav-open');
                          misc.navbar_menu_visible = 0;
                          $('#bodyClick').remove();
                          setTimeout(function(){
                              $toggle.removeClass('toggled');
                          }, 400);
                      });

                      $('html').addClass('nav-open');
                      misc.navbar_menu_visible = 1;

                  }
              });
              navbar_initialized = true;
          }

      };
      // Init navigation toggle for small screens
      if($(window).width() <= 991){
      initRightMenu();
      }
      // activate collapse right menu when the windows is resized
      $(window).resize(function(){
          if($(window).width() <= 991){
              initRightMenu();
          }
      });
  },
    copyLinkCtrl: function(){
    document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget"), "copyButton");
    });

    function copyToClipboardMsg(elem, msgElem) {
        var succeed = copyToClipboard(elem);
        var msg;
        if (!succeed) {
            msg = "Press Ctrl+c to copy."
        } else {
            msg = "Copied."
        }
        if (typeof msgElem === "string") {
            msgElem = document.getElementById(msgElem);
        }
        msgElem.textContent = msg;
        setTimeout(function() {
            msgElem.textContent = "copy";
        }, 2000);
    }

    function copyToClipboard(elem) {
          // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
              succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
  }
}
