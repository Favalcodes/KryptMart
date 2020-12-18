$(function () {


    /* ===============================================================
         LIGHTBOX
      =============================================================== */
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });


    /* ===============================================================
         PRODUCT SLIDER
      =============================================================== */
    $('.product-slider').owlCarousel({
        items: 1,
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item'
    });


    /* ===============================================================
         PRODUCT QUNATITY
      =============================================================== */
      $('.dec-btn').click(function () {
          var siblings = $(this).siblings('input');
          if (parseInt(siblings.val(), 10) >= 1) {
              siblings.val(parseInt(siblings.val(), 10) - 1);
          }
      });

      $('.inc-btn').click(function () {
          var siblings = $(this).siblings('input');
          siblings.val(parseInt(siblings.val(), 10) + 1);
      });


      /* ===============================================================
           BOOTSTRAP SELECT
        =============================================================== */
      $('.selectpicker').on('change', function () {
          $(this).closest('.dropdown').find('.filter-option-inner-inner').addClass('selected');
      });


      /* ===============================================================
           TOGGLE ALTERNATIVE BILLING ADDRESS
        =============================================================== */
      $('#alternateAddressCheckbox').on('change', function () {
         var checkboxId = '#' + $(this).attr('id').replace('Checkbox', '');
         $(checkboxId).toggleClass('d-none');
      });


      /* ===============================================================
           DISABLE UNWORKED ANCHORS
        =============================================================== */
      $('a[href="#"]').on('click', function (e) {
         e.preventDefault();
      });

});


/* ===============================================================
     COUNTRY SELECT BOX FILLING
  =============================================================== */
$.getJSON('js/countries.json', function (data) {
    $.each(data, function (key, value) {
        var selectOption = "<option value='" + value.name + "' data-dial-code='" + value.dial_code + "'>" + value.name + "</option>";
        $("select.country").append(selectOption);
    });
})


// Form select

$("#role").change(function() {
    // seller
    if ($(this).val() == "seller") {
      $('#seller').show();
      $('#store').attr('required', '');
      $('#store').attr('data-error', 'This field is required.');
    } else {
      $('#seller').hide();
      $('#store').removeAttr('required');
      $('#store').removeAttr('data-error');
    }

    // manufacturer
    if ($(this).val() == "manufacturer") {
      $('#manufacturer').show();
      $('#company').attr('required', '');
      $('#company').attr('data-error', 'This field is required.');
      $('#product').attr('required', '');
      $('#product').attr('data-error', 'This field is required.');
    } else {
      $('#manufacturer').hide();
      $('#company').removeAttr('required');
      $('#company').removeAttr('data-error');
      $('#product').removeAttr('required');
      $('#product').removeAttr('data-error');
    }

    // merchants
    if ($(this).val() == "merchant") {
      $('#merchant').show();
      $('#company').attr('required', '');
      $('#company').attr('data-error', 'This field is required.');
    } else {
      $('#merchant').hide();
      $('#company').removeAttr('required');
      $('#company').removeAttr('data-error');
    }
  });
  $("#role").trigger("change");
