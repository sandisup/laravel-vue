function membalikkanKata(str) {
    if (str === '') {
     return '';
    }
   else {
     return membalikkanKata(str.substr(1)) + str.charAt(0);
    }
   }
   console.log(membalikkanKata('abcde'));