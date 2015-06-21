<h5>
    Ми завжди поруч у Вашому місті. Завітайте до нас в «Ломбард Економь»
 - і Ви відкриєте для себе нову можливість у реалізації своїх планів та 
мрій!
</h5>

<div style="text-align: center;">
    <a href="javascript:showDialog('calk',350);">
        <img alt="" src="http://lombard-econom.pp.ua/img/calk-online.jpg"></a>
    <a href="javascript:show('http://lombard-econom.pp.ua/gold.html', '', 620, 420)">
        <img alt="" src="http://lombard-econom.pp.ua/img/bt-gold.jpg"></a>
</div>

<div id="shtorka"></div>
<div id="calk" class="dialog">
    <a class="close" href="javascript:hideDialog('calk')">×</a>
    <header>Розрахунок відсоткової ставки</header>
    <div class="content" style="text-align:center;">
        <label>Виберіть залоговий актив: </label>
        <select name="activ" id="activ">
            <option selected> -- select an option -- </option>
            <option value="gold">Золото</option>
            <!-- <option value="silver">Срібло</option> -->
            <option value="tehnika">Техника</option>
        </select>

        <div class="gold" >
            <label>Проба: </label>
            <select name="proba" class="proba">
                <option selected> -- select an option -- </option>
                <?php 
                foreach($this->model as $gold): ?>
                    <option data-object='{"price":"<?= $gold->price; ?>", "procent":<?= $gold->procent; ?>}' value="<?= $gold->type; ?>"><?= $gold->type; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Вага: </label>
            <input class="vaga" type="text" style="width:100px;" class="numbersOnly" value="1">
            
            
            <label>Ціна за грам: </label>
            <div class="gold-price" style="font-size:20px;"></div>

            <div style="padding-bottom:25px;">
                <p>
                    Відсоткова ставка складає:
                </p>
                <span style="font-size:20px;" class="calk-p"></span>
            </div>

            <label>Вкажіть термін позики в днях:</label>
            <input class="calk-sum" type="text" style="width:100px;" class="numbersOnly" value="1">
            
            <div style="font-size:16px; padding-bottom:10px;padding-top:10px;">
                <p>
                    Сумма на руки:
                </p>
                <span style="font-size:20px;" class="gold-money"></span>
            </div>
            
            <div style="font-size:16px; padding-bottom:10px;">
                <p>
                    Сумма за користування кредитом:
                </p>
                <span style="font-size:20px;" class="gold-credit"></span>
            </div>
        </div>

        <div class="silver" >
            
            <label>Проба: </label>
            <select name="proba" class="proba">
                <option disabled selected> -- select an option -- </option>
                <?php 
                foreach($this->silverModel as $silver): ?>
                    <option data-object='{"price":"<?= $silver->price; ?>", "procent":<?= $silver->procent; ?>}' value="<?= $silver->type; ?>"><?= $silver->type; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Вага: </label>
            <input class="vaga" type="text" style="width:100px;" class="numbersOnly" value="1">
            
            
            <label>Ціна за грам: </label>
            <div class="gold-price" style="font-size:20px;"></div>

            <div style="padding-bottom:25px;">
                <p>
                    Відсоткова ставка складає:
                </p>
                <span style="font-size:20px;" class="calk-p"></span>
            </div>

            <label>Вкажіть термін позики в днях:</label>
            <input class="calk-sum" type="text" style="width:100px;" class="numbersOnly" value="1">
            
            <div style="font-size:16px; padding-bottom:10px;padding-top:10px;">
                <p>
                    Сумма на руки:
                </p>
                <span style="font-size:20px;" class="silver-money"></span>
            </div>
            
            <div style="font-size:16px; padding-bottom:10px;">
                <p>
                    Сумма за користування кредитом:
                </p>
                <span style="font-size:20px;" class="silver-credit"></span>
            </div>
        </div>

        <div class="tehnika" >
            
            <div style="padding-bottom:25px;">
                <p>
                    Відсоткова ставка складає:
                </p>
                <span style="font-size:20px;" class="calk-p"><?= $this->tehnikaModel->procent; ?> %</span>
            </div>

        </div>



    </div>
</div>
<script type="text/javascript">


        $('.gold').hide();
        $('.tehnika').hide();
        $('.silver').hide();



      function validate() {
          $('#senderBtn').hide();
          if ($.trim($('#ctl00_TextBox1').val()).length <= 2) return;
          if (!isValidEmailAddress($('#ctl00_TextBox2').val())) return;
          if ($.trim($('#ctl00_TextBox3').val()).length <= 2) return;
          if ($.trim($('#ctl00_TextBox4').val()).length <= 5) return;
          if ($.trim($('#ctl00_TextBox5').val()).length <= 2) return;
          $('#senderBtn').show();
      }

      function showAddForms() {
          var selected = $('#ctl00_DropDownList2 :selected').val();
          $('#auto-request').hide();
          $('#watch-request').hide();

          switch (selected) {
              case 'Автомото техніка': $('#auto-request').show(); break;
              case 'Годинники': $('#watch-request').show(); break;
           }

      }

    function culc() {
        var active = $('#activ').find(':selected').val();
        var obj = $('.'+active).find('.proba').find(':selected').data('object');

        var procent = obj.procent;
        var price = obj.price;
        var vaga = $('.vaga').val();
        var days = $('.calk-sum').val();

        console.log(obj);
        console.log($('.'+active+'-money'));


        $('.'+active+'-money').html( price * vaga + ' грн' );
        $('.'+active+'-credit').html( ( (price * vaga * procent) / 100) * days + ' грн' );
        
    }

    $('#activ').change(function(){

        if( $(this).val() == 'tehnika'){
            $('.tehnika').show();
            $('.gold').hide();
            $('.silver').hide();
        } else if( $(this).val() == 'gold' ) {
            $('.gold').show();
            $('.tehnika').hide();
            $('.silver').hide();
        } else if( $(this).val() == 'silver' ) {
            $('.silver').show();
            $('.gold').hide();
            $('.tehnika').hide();
        }
    });

    $('.gold').find('.proba').change(function(){
        var obj = $(this).find(':selected').data('object');
        // console.log(obj);
        $('.calk-p').html(obj.procent+'%');
        $('.gold-price').html(obj.price+' грн');

        culc();
    });

    $('.silver').find('.proba').change(function(){
        var obj = $(this).find(':selected').data('object');
        // console.log(obj);
        $('.calk-p').html(obj.procent+'%');
        $('.gold-price').html(obj.price+' грн');

        console.log('silver-proba');

        culc();
    });

    $('.silver').find('.vaga').change(function(){
        culc();
    });

    $('.gold').find('.vaga').change(function(){
        culc();
    });

    $('.gold').find('.calk-sum').change(function(){
        culc();
    });

    $('.silver').find('.calk-sum').change(function(){
        culc();
    });


  </script>