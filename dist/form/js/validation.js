    const telv = /^0[0-9]{9,10}$/
    const emailv = /[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/
    const zipcodev = /^[0-9]{7}$/

    v8n.extend({
        tel: expected => {
          return value => telv.test(value);
        },
        email: expected => {
        return value => emailv.test(value);
        },
        zipcode: expected => {
        return value => zipcodev.test(value);
        },
      });

    const validationInputs = document.getElementsByClassName('js-error');
    const validationValue = (target)=>{
      let result = "";
      let message = "";
      switch (target.type) {
        case "text":
          //郵便番号
          if(target.autocomplete == "postal-code"){
            result = v8n()
              .not.empty()
              .zipcode()
              .testAll(target.value);
          }else{
            result = v8n()
              .not.empty()
              .testAll(target.value);
            }
          break;

        case "tel":
          result = v8n()
            .not.empty()
            .tel()
            .testAll(target.value);
          break;

        case "email":
          result = v8n()
            .not.empty()
            .email()
            .testAll(target.value);
          break;

        default:
          break;
      }
      //エラーの時
      if (result.length) {
        target.style.backgroundColor = "#FFF2F2"
        target.nextElementSibling.style.display = 'block';
        //エラーメッセージ
        if (result[0].rule.name == "empty") {
          message = "[!]必須項目に必ずご記入ください"
        }
        if (result[0].rule.name == "zipcode") {
          message = "[!]7桁を利用し、半角英数字でご記入ください"
        }
        if (result[0].rule.name == "tel") {
          message = "[!]10桁から11桁の間で半角英数字でハイフン無しでご記入ください"
        }
        if (result[0].rule.name == "email") {
          message = "[!]半角英数でご記入ください"
        }
        target.nextElementSibling.textContent = message;
      } else {
        target.style.backgroundColor = "#FFF"
        target.nextElementSibling.style.display = 'none';
      }
    }

    //テキストエリア用
    const checkTextarea = (target) => {
      if(target.value == ""){
        target.style.backgroundColor = "#FFF2F2"
        target.nextElementSibling.style.display = 'block';
        target.nextElementSibling.textContent = "[!]必須項目に必ずご記入ください";
      }else{
        target.style.backgroundColor = "#FFF"
        target.nextElementSibling.style.display = 'none';
      }
    }