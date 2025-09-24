@extends('layouts.base')

@section('title', 'Тест')

@section('content')
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		<tr><td align="center">
			<table width="460" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid rgba(20, 41, 54, 0.2);font-family: Arial, sans-serif;color: #00306F;letter-spacing: -0.4px;font-size: 14px;">
				<tr><td height="20">&nbsp;</td></tr>
				<tr><td align="center"><img src="{{asset('storage/images/logo.png')}}" alt="" border="0" width="100" style="display:block;"/></td></tr>
				<tr><td height="20">&nbsp;</td></tr>
				<tr><td align="center"><span style="font-size: 30px;font-weight: 500;">Электронный чек</span></td></tr>
				<tr><td>
					<table border="0" cellpadding="0" cellspacing="0" width="460" style="font-family: Arial, sans-serif;color: #00306F;letter-spacing: -0.4px;font-size: 14px;word-break: break-all;border-collapse: separate;border-spacing: 3px 10px;">
						<tr><td><td colspan="2" height="2" bgcolor="e4e9ef"></td></td></tr>
						<tr valign="top"><td width="50%" align="left">ДАТА ВЫДАЧИ</td><td width="50%" align="right">20.01.20 12:42</td></tr>
						<tr valign="top"><td width="50%" align="left">ЭЛ. АДР. ПОКУПАТЕЛЯ</td><td width="50%" align="right"><a href="/compose?To=darkking9733@mail.ru">darkking9733@mail.ru</a></td></tr>
						<tr><td colspan="2" height="2" bgcolor="e4e9ef"></td></tr>
						<tr valign="top"><td width="50%" align="left">Круассан миди 7 Days</td><td width="50%" align="right" valign="bottom">1 X 45.00<br><span> = </span>45.00</td></tr>
						<tr><td colspan="2" height="2" bgcolor="e4e9ef"></td></tr>
						<tr valign="top" style="font-size:30px;"><td width="50%" align="left">ИТОГ</td><td width="50%" align="right">45.00</td></tr>
					</table>
				</td></tr>
			</table>
		</td></tr>
	</table>
@endsection
