function startCalc(){
    interval = setInterval('calc()');}
    function calc()
    {
        one = document.bayar.jumlah.value;
        two = 175000;
        document.bayar.nominal.value = (one) * (two);
    }
    function stopCalc(){
    clearInterval(interval);}