function terbilang(x)
{
	var ambil =new Array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
	if (parseFloat(x) < 12)
	{
		x=Math.floor(x);
		return " "+ambil[x];
	}
	else if (parseFloat(x) < 20)
	{
		return terbilang(parseFloat(x) - 10)+" BELAS";
	}
	else if (parseFloat(x) < 100)
	{
		return terbilang(parseFloat(x) / 10)+" PULUH"+terbilang(parseFloat(x)%10);
	}
	else if (parseFloat(x) < 200)
	{
		return " SERATUS"+terbilang(parseFloat(x)-100);
	}
	else if (parseFloat(x) < 1000)
	{
		return terbilang(parseFloat(x) / 100)+" RATUS"+terbilang(parseFloat(x)%100);
	}
	else if (parseFloat(x) < 2000)
	{
		return " SERIBU"+terbilang(parseFloat(x) - 1000);
	}
	else if (parseFloat(x) < 1000000)
	{
		return terbilang(parseFloat(x) / 1000)+" RIBU"+terbilang(parseFloat(x)%1000);
	}
	
	
}

console.log(terbilang(104))