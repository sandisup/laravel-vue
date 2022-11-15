function tahunKabisat(year) {

    if ((0 == year % 4) && (0 != year % 100) || (0 == year % 400)) {
        console.log(year + ' adalah tahun kabisat');
    } else {
        console.log(year + ' bukan tahun kabisat');
    }
}

console.log(tahunKabisat(2024));