//__________________________________________________________________________//
///////////////////////////////////////////////////////////////////////
                // Генерация поля для полей select//
/////////////////////////////////////////////////////////////////////
//************************************************************************//
/*
 Функция injectSelect принимает объект select и ассоциативный массив.
 Select очищается, затем в него добавляются элементы option,
 значение которых устанавливают ключи массива, а текст — значения массива.
 Ничего не возвращает.
 */
function injectSelect (sel, rowsObject) {
    var opt, x;
    sel.innerHTML = "";
    for (x in rowsObject) {
        opt = document.createElement("option");
        opt.value = x;
        opt.innerHTML = rowsObject[x];
        sel.appendChild(opt);
    }
}
/*
 Функция makeNumbersObject принимает два числа. Возвращает ассоциативный массив
 ряда чисел от меньшего к большему, включительно.
 */
function makeNumbersObject (from, to, month) {
    var result = {}, x;

    if(from > to) { // Если from меньше to, поменять их значения друг на друга.
        var z = from;
        from = to;
        to = z;
    }
    if(month == null){
        for (x = from; x <= to; x++) {
            result[x] = x;
        }
        return result;
    }
    if(month == "feb"){
        for (x = from; x <= to-2; x++) {
            result[x] = x;
        }
        return result;
    }if(month == "apr"){
        for (x = from; x <= to-1; x++) {
            result[x] = x;
        }
        return result;
    }if(month == "jun"){
        for (x = from; x <= to-1; x++) {
            result[x] = x;
        }
        return result;
    }if(month == "sep"){
        for (x = from; x <= to-1; x++) {
            result[x] = x;
        }
        return result;
    }if(month == "nov"){
        for (x = from; x <= to-1; x++) {
            result[x] = x;
        }
        return result;
    }if(month = "jan"|| "mar"||"may"||"jul"||"aug"||"oct"||"dec"){
        for (x = from; x <= to; x++) {
            result[x] = x;
        }
        return result;
    }
}

function select_months(){
    var n = document.getElementById("months").options.selectedIndex;
    var month = document.getElementById("months").options[n].value;
    injectSelect(document.getElementById("days"), makeNumbersObject(1, 31, month));// Наполняем дни
}

injectSelect(document.getElementById("months"), {
    jan:"Январь", feb:"Февраль", mar:"Март", apr:"Апрель",
    may:"Май", jun:"Июнь", jul:"Июль", avg:"Август",
    sep:"Сентябрь", oct:"Октябрь", nov:"Ноябрь", dec:"Декабрь"
}); // Наполняем месяца
injectSelect(document.getElementById("years"), makeNumbersObject(1940, 2016, null)); // Наполняем года
m = select_months();



//__________________________________________________________________________//
    ///////////////////////////////////////////////////////////////////////
    // Проверка введенного имени и сообщения и [включение] кнопки submit//
    /////////////////////////////////////////////////////////////////////
//************************************************************************//
function checkreq()
// Выполняет: описания нет
{
    path=document.form_registration_user;
    tmp=(path.sender.value=='');
    if (!tmp && (path.sender.value.length < 3)) {tmp=true;}
    path.Submit.disabled=tmp;
    if (tmp) {return;}
    tmp=(path.msg.value=='');
    if (!tmp && (path.msg.value.length < 10)) {tmp=true;}
    path.Submit.disabled=tmp;
}

// Проверка корректности заполнения полей формы
function check()
// Выполняет: описания нет
{
    //--------------------Name--------------------------//
    p_sender=document.form_create.login.value.toString();
    if (p_sender!='')
    {if (p_sender.length<3 || p_sender.length>20)
    {alert ('Укажите ваше имя (3-20 символов)!');
        document.form_create.login.focus();
    }
    }
    else
    {alert('Необходимо ввести имя!');
        document.form_create.login.focus();
    }

    //------------------SurName---------------------//
    p_sender=document.form_create.value.toString();
    if (p_sender!='')
    {if (p_sender.length<3 || p_sender.length>20)
    {alert ('Укажите ваше имя (3-20 символов)!');
        document.form_create.sername.focus();
    }
    }
    else
    {alert('Необходимо ввести имя!');
        document.form_create.surname.focus();
    }

    //------------------password---------------------//
    p_sender=document.form_create.password.value.toString();
    if (p_sender!='')
    {if (p_sender.length<3 || p_sender.length>20)
    {alert ('Укажите ваше имя (3-20 символов)!');
        document.form_create.password.focus();
    }
    }
    else
    {alert('Необходимо ввести имя!');
        document.form_create.password.focus();
    }
}