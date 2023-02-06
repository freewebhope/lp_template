//セレクトボックスのplaceholderの色
const selectColor = document.getElementsByClassName('js-selecColor');
for (let i = 0; i < selectColor.length; i++) {
    selectColor[i].addEventListener("change", function () {
      if (selectColor[i].value == "") {
        selectColor[i].style.color = "#757575"
      } else {
        selectColor[i].style.color = "#252525"
      }
    });
  }

//名前を入力した際の自動入力
  document.addEventListener("DOMContentLoaded", function () {
    AutoKana.bind("#js-name", "#js-furigana", { katakana: true });
  });

// チェックボックスとラジオボタンのその他を押した時、その他用の入力欄表示
const otherMarkInput = document.getElementsByClassName('js-otherMarkInput');
const otherText = document.getElementsByClassName('js-otherText');
const displayOther = (num) =>{
  if(otherMarkInput[num].checked){
    otherText[num].style.display = 'block'
  }else{
    otherText[num].style.display = 'none'
  }
}