(function(_, $) {
    (function($) {

        var maps = [];
        var saved_point = null;
        var map_params = [];

        var latitude = 0;
        var longitude = 0;
        var zoom = 0;

        var latitude_name = '';
        var longitude_name = '';
        var map_container = '';

        var start_init_sdekmaps = false;
        var finish_init_sdekmaps = false;

        var methods = {

            init: function(options, callback) {

                var group_key = options.group_key;
                var shipping_id = options.shipping_id;

                if (! ('sdekmaps' in window)) {

                    if (!start_init_sdekmaps) {
                        start_init_sdekmaps = true;

                        $.getScript('//api-maps.yandex.ru/2.1/?ns=sdekmaps&lang=' + options.language, function () {
                            sdekmaps.ready(function () {
                                finish_init_sdekmaps = true;
                                setTimeout(function() { $.ceSdekPickup('init', options, callback); }, 500);
                            });
                        });
                    } else {
                        setTimeout(function() { $.ceSdekPickup('init', options, callback); }, 500);
                    }

                    return false;
                }

                if (!start_init_sdekmaps || (start_init_sdekmaps && !finish_init_sdekmaps)) {
                    setTimeout(function() { $.ceSdekPickup('init', options, callback); }, 500);

                    return false;
                }

                latitude = options.latitude;
                longitude = options.longitude;
                map_container = options.sdek_map_container;

                zoom = options.zoom;

                // Required fields - zoom, center
                map_params[shipping_id] = {
                    zoom: 12,
                    type: 'yandex#map',
                    center: [latitude, longitude],
                    controls: ['default']
                };


                if (_.area == 'A') {
                    $.extend(map_params[shipping_id], {
                        draggableCursor: 'crosshair',
                        draggingCursor: 'pointer'
                    });
                } else {
                    $.extend(map_params[shipping_id], {
                        zoom: zoom
                    });
                }

                if (typeof(callback) == 'function') {
                    callback();
                }
            },

            destroyMaps: function(shipping_id)
            {
                maps.forEach(function(element, index) {
                    if ($('#sdek_map_' + index).length) {
                        try {
                            maps[index].destroy();
                        } catch (error) {
                            console.log('Error in ymaps.destroy method: ' + error);
                        }
                    }
                });
                maps = [];
            },

            show: function(options)
            {
                if (typeof options == "undefined") {
                    return false;
                }

                var group_key = options.group_key;
                var shipping_id = options.shipping_id;

                if (!map_params[shipping_id]) {
                    return $.ceSdekPickup('init', options, function() {

                        $.ceSdekPickup('show', options);
                    });
                }

                if (maps[shipping_id]) {
                    $.ceSdekPickup('destroyMaps');
                }

                if (!maps[shipping_id] || typeof maps[shipping_id].layers == "undefined" || !$('ymaps').length) {

                    maps[shipping_id] = new sdekmaps.Map(document.getElementById(options.sdek_map_container), map_params[shipping_id]);

                    maps[shipping_id].controls.remove('searchControl');
                    maps[shipping_id].behaviors.disable(['scrollZoom']);

                    // Disable map dragging on mobiles 
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        maps[shipping_id].behaviors.disable('drag');
                    }

                    var marker;
                    var cluster = [];
                    storeData = options.storeData;

                    for (var keyvar = 0; keyvar < storeData.length; keyvar++) {

                        var marker_html = '<div style="padding-right: 10px"><strong>' + storeData[keyvar]['name'];

                        marker_html += '</strong><p>';

                        if (storeData[keyvar]['city'] != '') {
                            marker_html += storeData[keyvar]['city'] + ', ';
                        }

                        if (typeof(storeData[keyvar]['pickup_address']) !== 'undefined') {
                            marker_html += storeData[keyvar]['pickup_address'];
                        }

                        if (typeof(storeData[keyvar]['pickup_phone']) !== 'undefined') {
                            marker_html += '<br/>' + storeData[keyvar]['pickup_phone'];
                        }

                        if (typeof(storeData[keyvar]['pickup_time']) !== 'undefined') {
                            marker_html += '<br/>' + storeData[keyvar]['pickup_time'];
                        }

                        if (options['selectStore'] === true) {
                            marker_html += '<p><a data-ca-shipping-id="' + storeData[keyvar]['shipping_id'] + '" data-ca-group-key="' + storeData[keyvar]['group_key'] + '" data-ca-location-id="' + storeData[keyvar]['store_location_id'] + '" class="cm-sdek-select-location ty-btn ty-btn__tertiary text-button">Выбрать</a></p>';
                        }

                        marker_html += '</p></div>';

                        marker = new sdekmaps.Placemark([storeData[keyvar]['latitude'], storeData[keyvar]['longitude']], {
                            balloonContentBody: marker_html
                        });

                        maps[shipping_id].geoObjects.add(marker);
                        cluster.push(marker);

                    }

                    clusterer = new sdekmaps.Clusterer();
                    clusterer.add(cluster);
                    maps[shipping_id].geoObjects.add(clusterer);

                    var select = $('.ty-sdek-office__radio-' + group_key + ':checked').attr('value');

                    if (select) {
                        $.each(storeData, function (key, value) {
                            if (value['store_location_id'] == select) {
                                maps[shipping_id].setCenter([value['latitude'], value['longitude']]);
                                maps[shipping_id].setZoom(zoom);
                                return false;
                            }
                        });
                    } else {
                        maps[shipping_id].setBounds(clusterer.getBounds(), {
                            checkZoomRange: true
                        });
                    }
                }
            },

            saveLocation: function()
            {
                if (saved_point) {
                    $('#' + latitude_name).val(saved_point[0]);
                    $('#' + latitude_name + '_hidden').val(saved_point[0]);
                    $('#' + longitude_name).val(saved_point[1]);
                    $('#' + longitude_name + '_hidden').val(saved_point[1]);
                }

                saved_point = null;
            },

            selectLocation: function(location, group_key, shipping_id)
            {
                if (maps[shipping_id]) {
                    maps[shipping_id].destroy();
                }
                
                $('#office_' + group_key + '_' + shipping_id + '_' + location).prop("checked", true);
        
                fn_calculate_total_shipping_cost();
            },

            viewLocation: function(latitude, longitude, group_key)
            {
                maps[shipping_id].setCenter([latitude, longitude]);
                maps[shipping_id].setZoom(zoom);
            }
        };

        $.extend({
            ceSdekPickup: function(method) {
                if (methods[method]) {
                    return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
                } else {
                    $.error('ty.map: method ' +  method + ' does not exist');
                }
            }
        });
    })($);

    $(document).ready(function() {

        $(document).on('click', '.cm-sdek-select-store', function(e) {
            $.ceEvent('trigger', 'ce.shipping.select-store', []);
            $.ceSdekPickup('destroyMaps');

            fn_calculate_total_shipping_cost();
        });

        $(document).on('click', '.cm-sdek-save-location', function () {
            $.ceSdekPickup('saveLocation');
        });

        $(document).on('click', '.cm-sdek-select-location', function () {
            var jelm = $(this);
            var location = jelm.data('ca-location-id');
            var group_key = jelm.data('ca-group-key');
            var shipping_id = jelm.data('ca-shipping-id');

            var selected_location = $('.ty-sdek-checkout-select-office input[type=radio]:checked');
            if (selected_location.length === 0) {
                selected_location = $('.ty-sdek-checkout-select-office input[type=radio]').first().prop('checked', true);
            }
            selected_location.val(location);

            $.ceSdekPickup('selectLocation', location, group_key, shipping_id);
        });

        $(document).on('click', '.cm-sdek-view-location', function () {
            var jelm = $(this);
            var latitude = jelm.data('ca-latitude');
            var longitude = jelm.data('ca-longitude');
            var shipping_id = jelm.data('ca-shipping-id');

            $.ceSdekPickup('viewLocation', latitude, longitude, shipping_id);

            if ($(this).data('ca-scroll')) {
                var id = $(this).data('ca-scroll');
                $.scrollToElm(id);
            }
        });

        $(document).on('click', '.cm-show-all-on-map', function(e) {
            Tygh.$.ceAjax('request', fn_url('checkout.checkout&drop_select_office'), {
                result_ids: 'shipping_rates_list,checkout_info_summary_*,checkout_info_order_info_*',
                method: 'get',
                full_render: true,
            });
        });
    });
}(Tygh, Tygh.$));
