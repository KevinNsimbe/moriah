<style>
    @import url('https://fonts.googleapis.com/css?family=Amarante');

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { overflow-y: scroll; }
body { 
  background: #eee url('https://i.imgur.com/eeQeRmk.png'); /* https://subtlepatterns.com/weave/ */
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #585858;
  padding: 22px 10px;
  padding-bottom: 55px;
}

::selection { background: #5f74a0; color: #fff; }
::-moz-selection { background: #5f74a0; color: #fff; }
::-webkit-selection { background: #5f74a0; color: #fff; }

br { display: block; line-height: 1.6em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong, b { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/
#wrapper {
  display: block;
  width: 850px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('https://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('https://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}
</style>
<div class="container">
<div id="toolbar">
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
		</select>
</div>

<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar">
	<thead>
		<tr>
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="prenom" data-filter-control="input" data-sortable="true">Prénom</th>
			<th data-field="date" data-filter-control="select" data-sortable="true">Date</th>
			<th data-field="examen" data-filter-control="select" data-sortable="true">Examen</th>
			<th data-field="note" data-sortable="true">Note</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
			<td>Valérie</td>
			<td>01/09/2015</td>
			<td>Français</td>
			<td>12/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="1" name="btSelectItem" type="checkbox"></td>
			<td>Eric</td>
			<td>05/09/2015</td>
			<td>Philosophie</td>
			<td>8/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="2" name="btSelectItem" type="checkbox"></td>
			<td>Valentin</td>
			<td>05/09/2015</td>
			<td>Philosophie</td>
			<td>4/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="3" name="btSelectItem" type="checkbox"></td>
			<td>Valérie</td>
			<td>05/09/2015</td>
			<td>Philosophie</td>
			<td>10/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="4" name="btSelectItem" type="checkbox"></td>
			<td>Eric</td>
			<td>01/09/2015</td>
			<td>Français</td>
			<td>14/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="5" name="btSelectItem" type="checkbox"></td>
			<td>Valérie</td>
			<td>07/09/2015</td>
			<td>Mathématiques</td>
			<td>19/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="6" name="btSelectItem" type="checkbox"></td>
			<td>Valentin</td>
			<td>01/09/2015</td>
			<td>Français</td>
			<td>11/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="7" name="btSelectItem" type="checkbox"></td>
			<td>Eric</td>
			<td>01/10/2015</td>
			<td>Philosophie</td>
			<td>8/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="8" name="btSelectItem" type="checkbox"></td>
			<td>Valentin</td>
			<td>07/09/2015</td>
			<td>Mathématiques</td>
			<td>14/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="9" name="btSelectItem" type="checkbox"></td>
			<td>Valérie</td>
			<td>01/10/2015</td>
			<td>Philosophie</td>
			<td>12/20</td>
		</tr>
		<tr>
			<td class="bs-checkbox "><input data-index="10" name="btSelectItem" type="checkbox"></td>
			<td>Eric</td>
			<td>07/09/2015</td>
			<td>Mathématiques</td>
			<td>14/20</td>
		</tr>
		<tr>
		<td class="bs-checkbox "><input data-index="11" name="btSelectItem" type="checkbox"></td>
			<td>Valentin</td>
			<td>01/10/2015</td>
			<td>Philosophie</td>
			<td>10/20</td>
		</tr>
	</tbody>
</table>
</div>

<script>
    //exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("table");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});

    </script>