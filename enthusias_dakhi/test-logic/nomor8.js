function eduwork(num) {
    let hasil = "";
      for (let a = 1; a < num; a++)  {
          if (a % 3 == 0 && a % 5 == 0) {
            hasil += a + " Eduwork";
          }
          else {
            if (a % 5 == 0) {
              hasil += a + " Work";
            } 
            else {
              if (a % 3 == 0) {
              hasil += a +  " Edu";
            }
            else {
              hasil += a;
            }
          }
          }
        hasil += "\n";
      }
      return hasil;
    }
    console.log(eduwork(17));