
function formatCoin() {
    var elemento = document.getElementById('amount');
    var amount = elemento.value;
    
    amount = amount + '';
    amount = parseInt(amount.replace(/[\D]+/g,''));
    amount = amount + '';
    amount = amount.replace(/([0-9]{2})$/g, ",$1");
  
    if (amount.length > 6) {
      amount = amount.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }
    elemento.value = amount;

    if(amount == 'NaN') elemento.value = '';
}
