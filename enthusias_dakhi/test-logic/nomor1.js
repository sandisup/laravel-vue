function perkalianBerulang(num) {
  let results = 1;

  for (let i = 2; i <= num; i++) {
    results = results * i;
  }

  return results;
}

console.log(perkalianBerulang(4));