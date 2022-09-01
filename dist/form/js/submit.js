    const postData = () => {
      //その他が選ばれてなければ送信しない
      for (let index = 0; index < otherMarkInput.length; index++) {
          if(otherMarkInput[index].checked == false){
            otherText[index].disabled = true;
          }else{
            otherText[index].disabled = false;
          }
      }
      console.log(document.getElementsByName('submitBtn')[0]);
      document.getElementById('js-submit').click();
    }