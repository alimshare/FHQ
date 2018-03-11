<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
		.page-break {
		    page-break-after: always;
		}
		body {
			font-family: monospace;
			font-size: 13pt;
		}
		table th, table td {
			text-align: center;
		}
	</style>
</head>
<body>

	<h2 style="text-align: center">Jadwal Kegiatan Belajar Mengajar</h2>
	<br>

    @foreach ( $data as $key => $value )
		<table width="100%" border="1" cellspacing="0" cellpadding="8px">
			<tr>
				<th width="15%">Hari</th>
				<th width="15%">Level</th>
				<th width="20%">Pengajar</th>
				<th width="40%">Santri</th>
			</tr>
	        <tbody>
	        	<?php 
	        		$rowspan = count($value->peserta);
	        	?>
	        	@foreach ( $value->peserta as $keyPeserta => $peserta )
		            <tr>
			          @if ($keyPeserta == 0)
		              <td rowspan="{{ $rowspan }}">{{ strtoupper($value->hari) }} </td>
		              <td rowspan="{{ $rowspan }}">{{ $value->getLevel()->nama or '-' }} </td>
		              <td rowspan="{{ $rowspan }}">{{ $value->getPengajar()->nama or '-' }} </td>
			          @endif
		              <td style="text-align: left">{{  $peserta->getSantri()->nama or '-' }} </td>
		            </tr>
	            @endforeach
	        </tbody>

		</table>
		
		<br>
		<br>
		<br>

		<?php if ($key < count($data)-1 ): ?>
			<div class="page-break"></div>			
		<?php endif ?>

    @endforeach

</body>
</html>