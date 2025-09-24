<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td align="center">
		<table width="460" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid rgba(20, 41, 54, 0.2);font-family: Arial, sans-serif;color: #00306F;letter-spacing: -0.4px;font-size: 14px;">
			<tr><td height="20">&nbsp;</td></tr>
			<!-- {{asset('storage/images/logo.png')}} -->
			<tr><td align="center"><img src="https://i.imgur.com/QGfj9ZL.png" alt="" border="0" width="100%" style="display:block;"/></td></tr>
			<tr><td height="20">&nbsp;</td></tr>
			<tr><td align="center"><span style="font-size: 30px;font-weight: 500;">Электронный чек #{{$num}}</span></td></tr>
			<tr><td>
				<table border="0" cellpadding="0" cellspacing="0" width="460" style="font-family: Arial, sans-serif;color: #00306F;letter-spacing: -0.4px;font-size: 14px;word-break: break-all;border-collapse: separate;border-spacing: 3px 10px;">
					<tr><td colspan="4" height="2" bgcolor="e4e9ef"></td></tr>
					<tr valign="top"><td colspan="2" width="50%" align="left">ДАТА ВЫДАЧИ</td><td colspan="2" width="50%" align="right">{{$date}}</td></tr>
					<tr valign="top"><td colspan="2" width="50%" align="left">ЭЛ. АДР. ПОКУПАТЕЛЯ</td><td colspan="2" width="50%" align="right"><a href="/compose?To={{$mail}}">{{$mail}}</a></td></tr>
					<tr><td colspan="4" height="2" bgcolor="e4e9ef"></td></tr>
					<tr valign="top"><td align="center">Наименование</td><td align="center" style="white-space: nowrap;">Кол-во</td><td align="center">Цена</td><td align="center">Сумма</td></tr>
					@foreach ($products as $product)
						<tr valign="top"><td align="left">{{ $product->Name }}</td><td align="right">{{ $orderproducts->where('ProductID', $product->ID)->first()->Count }} *</td><td align="right">{{ $product->Price }}.00 =</td><td align="center">{{$orderproducts->where('ProductID', $product->ID)->first()->Count*$product->Price}}.00</td></tr>
					@endforeach
					<tr><td colspan="4" height="2" bgcolor="e4e9ef"></td></tr>
					<tr valign="top" style="font-size:30px;"><td colspan="2" width="50%" align="left">ИТОГ</td><td colspan="2" width="50%" align="right">{{$total}}.00 &#x20bd;</td></tr>
				</table>
			</td></tr>
		</table>
	</td></tr>
</table>