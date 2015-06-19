<h5>
    Ми завжди поруч у Вашому місті. Завітайте до нас в «Ломбард Економь»
 - і Ви відкриєте для себе нову можливість у реалізації своїх планів та 
мрій!
</h5>

<div style="text-align: center;">
    <a href="javascript:showDialog('calk',350);">
        <img alt="" src="http://mlombard.com.ua/userfiles/image/calk-online.jpg"></a>
    <a href="javascript:show('http://lombard-econom.pp.ua/gold.html', '', 620, 420)">
        <img alt="" src="http://mlombard.com.ua/userfiles/image/bt-gold.jpg"></a>
</div>

<div id="shtorka"></div>
<div id="zayavka" class="dialog">
    <a class="close" href="javascript:hideDialog('zayavka')">×</a>
    <header>Заявка</header>
    <div class="content">
        <label>Імя:</label>
        <input name="ctl00$TextBox1" type="text" id="ctl00_TextBox1" onkeypress="validate()">
        <table class="no-borders">
            <tbody>
                <tr class="even">
                    <td>
                        <label>Телефон:</label>
                        <input name="ctl00$TextBox3" type="text" id="ctl00_TextBox3" onkeypress="validate()" class="phoneOnly" style="width:150px;"></td>
                    <td>
                        <label>Email:</label>
                        <input name="ctl00$TextBox2" type="text" id="ctl00_TextBox2" onkeypress="validate()" style="width:150px;"></td>
                </tr>
            </tbody>
        </table>
        <label>Місто:</label>
        <select name="ctl00$DropDownList1" id="ctl00_DropDownList1">
            <option value="Ужгород">Ужгород</option>
            <option value="Мукачево">Мукачево</option>
            <option value="Хуст">Хуст</option>
            <option value="Берегово">Берегово</option>
            <option value="Виноградів">Виноградів</option>
            <option value="Іршава">Іршава</option>
            <option value="Перечин">Перечин</option>

        </select>
        <br>
        <table class="no-borders">
            <tbody>
                <tr class="odd">
                    <td>
                        <label>Сума позики, грн.:</label>
                        <input name="ctl00$TextBox5" type="text" id="ctl00_TextBox5" onkeypress="validate()" class="numbersOnly" style="width:150px;"></td>
                    <td>
                        <label>Предмет застави:</label>
                        <select name="ctl00$DropDownList2" id="ctl00_DropDownList2" onchange="showAddForms()" style="width:150px;">
                            <option value="Золото та ювелірні вироби">Золото та ювелірні вироби</option>
                            <option value="Мобільні телефони та побутова техніка">Мобільні телефони та побутова техніка</option>
                            <option value="Предмети живопису та антикваріат">Предмети живопису та антикваріат</option>
                            <option value="Годинники">Годинники</option>
                            <option value="Автомото техніка">Автомото техніка</option>
                            <option value="Нерухомість">Нерухомість</option>

                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="auto-request" style="display:none;">
            <table class="no-borders">
                <tbody>
                    <tr class="even">
                        <td>
                            <label>Марка автомобіля</label>
                            <input name="ctl00$TextBox6" type="text" id="ctl00_TextBox6" style="width:100px;"></td>
                        <td>
                            <label>Модель</label>
                            <input name="ctl00$TextBox7" type="text" id="ctl00_TextBox7" style="width:100px;"></td>
                    </tr>
                    <tr class="odd">
                        <td>
                            <label>Рік випуску</label>
                            <input name="ctl00$TextBox8" type="text" id="ctl00_TextBox8" class="numbersOnly" style="width:100px;"></td>
                        <td>
                            <label>Пробіг, км.</label>
                            <input name="ctl00$TextBox9" type="text" id="ctl00_TextBox9" class="numbersOnly" style="width:100px;"></td>
                    </tr>
                    <tr class="even">
                        <td>
                            <label>Обєм двигуна, літри</label>
                            <input name="ctl00$TextBox10" type="text" id="ctl00_TextBox10" style="width:100px;"></td>
                        <td>
                            <label>Коробка</label>
                            <select name="ctl00$DropDownList3" id="ctl00_DropDownList3" style="width:100px;">
                                <option value="Механічна">Механічна</option>
                                <option value="Автомат">Автомат</option>
                                <option value="Варіатор">Варіатор</option>

                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display:none;" id="watch-request">
            <table class="no-borders">
                <tbody>
                    <tr class="odd">
                        <td>
                            <label>Марка годинника</label>
                            <input name="ctl00$TextBox11" type="text" id="ctl00_TextBox11" style="width:100px;"></td>
                        <td>
                            <label>Модель</label>
                            <input name="ctl00$TextBox12" type="text" id="ctl00_TextBox12" style="width:100px;"></td>
                    </tr>
                    <tr class="even">
                        <td>
                            <label>Ref-Nr</label>
                            <input name="ctl00$TextBox13" type="text" id="ctl00_TextBox13" style="width:100px;"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <label>Опис предмету застави:</label>
        <textarea name="ctl00$TextBox4" rows="2" cols="20" id="ctl00_TextBox4" onkeypress="validate()"></textarea>
        <br>
        <label>
            Файл з описом предмету <em>(фотографія або архів)</em>
            :
        </label>
        <input type="file" name="ctl00$FileUpload1" id="ctl00_FileUpload1">
        <br>
        <p> <em><strong>Увага!</strong>
                Для того щоб відправити заявку Вам необхідно заповнити усі поля.</em> 
        </p>
        <div style="display:none; text-align:center;" id="senderBtn">
            <input type="submit" name="ctl00$Button1" value="Надіслати" id="ctl00_Button1" class="button"></div>
    </div>
</div>
<div id="calk" class="dialog">
    <a class="close" href="javascript:hideDialog('calk')">×</a>
    <header>Розрахунок відсоткової ставки</header>
    <div class="content" style="text-align:center;">
        <label>Виберіть залоговий актив: </label>
        <select name="activ" id="activ">
            <option value="gold">Золото</option>
            <option value="phone">Телефон</option>
            <option value="tehnik">Техника</option>
        </select>

        <div class="gold" >
            <label>Проба: </label>
            <select name="proba" id="proba">
                <option value="999">999</option>
                <option value="525">525</option>
            </select>

            <label>Вага: </label>
            <input id="vaga" type="text" style="width:100px;" class="numbersOnly" value="1">
            
            <label>Ціна за грам: </label>
            <div style="font-size:20px;">400 грн</div>

            <div style="padding-bottom:25px;">
                <p>
                    Відсоткова ставка складає:
                    <br>
                    <br></p>
                <span style="font-size:24px;" id="calk-p">0.85 %</span>
            </div>

        </div>
        <label>Вкажіть термін позики в днях:</label>
        <input id="calk-sum" type="text" onkeyup="calk()" style="width:100px;" class="numbersOnly" value="1">

        
        <div style="font-size:54px; padding-bottom:10px;padding-top:30px;">65162 грн</div>

    </div>
</div>
<script type="text/javascript">
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

      function calk() {

          var p = '1.0 %';

          var count = parseInt($('#calk-sum').val());

          if (count >= 200)
              p = '0.9 %';
          if (count >= 500)
              p = '0.8 %';
          if (count >= 1000)
              p = '0.7 %';
          if (count >= 3000)
              p = '0.6 %';
          if (count >= 5000)
              p = '0.5 %';
          if (count >= 10000)
              p = '0.4 %';
          if (count >= 20000)
              p = '0.3 %';

          $('#calk-p').html(p);
      }
  </script>