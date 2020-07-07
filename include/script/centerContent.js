  (function($) {
                $.fn.Center= function(){
                    this.css({
                        'position': 'fixed', 'left': '50%', 'top': '50%'
                    });

                    this.css({
                        'margin-left': -this.width() / 2 + 'px',
                        'margin-top': -this.height() / 2 + 'px'
                    });
                };

            })(jQuery);

            $(document).ready(function (){
                $('#noConnect').Center();
            });

  (function($) {
                $.fn.CenterHeight= function(){
                    this.css({
                        'position': 'fixed', 'top': '50%'
                    });

                    this.css({
                        'margin-top': -this.height() / 2 + 'px'
                    });
                };

            })(jQuery);

            $(document).ready(function (){
                $('#ads').CenterHeight();
            });
