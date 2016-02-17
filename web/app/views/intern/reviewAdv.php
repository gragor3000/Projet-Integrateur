<div class="section">
	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row well">
						<div class="form-group col-md-6">
							<label class="control-label">>Nom du coordonnateur:</label>
							<p style="margin-top:7px;"><?= (isset($data['review'])) ? $data['review']->advName : '' ?></p>
						</div>
						<div class="form-group col-md-2">
							<label class="control-label">Note:</label>
							<p style="margin-top:7px;"><?= (isset($data['review'])) ? $data['review']->note : ''; ?></p>
						</div>
					</div>
					<h3 class="page-header">L&apos;&eacute;tudiant(e) participe ad&eacute;quatement aux diff&eacute;rentes &eacute;tapes de d&eacute;veloppement d&apos;une application informatique.</h3>
					<h4>Capacit&eacute; d&apos;analyse et de synth&egrave;se et application juste de la d&eacute;marche de d&eacute;veloppement de syst&egrave;me (/10)</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
										<th class="text-center">Cote</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sup&eacute;rieur</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) d&eacute;montre une tr&egrave;s bonne compr&eacute;hension du projet et il est capable d&apos;anticiper les probl&egrave;mes possibles. Il applique la d&eacute;marche de d&eacute;veloppement tout en identifiant les points critiques.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Satisfaisant</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) d&eacute;montre une bonne compr&eacute;hension du projet. Il applique la d&eacute;marche de d&eacute;veloppement de fa&ccedil;on coh&eacute;rente.</p>
										</td>
										<td>
                                           <p>7-8</p>
										</td>
									</tr>
									<tr>
										<td>Suffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) d&eacute;montre avec de l&apos;aide une bonne compr&eacute;hension du projet. Il applique la d&eacute;marche de d&eacute;veloppement mais a besoin de soutien occasionnel.</p>
										</td>
										<td>
                                            <p>6</p>
										</td>
									</tr>
									<tr>
										<td>Insuffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) a besoin de soutien constant pour la compr&eacute;hension du projet. Il n&apos;applique pas la d&eacute;marche de d&eacute;veloppement de syst&egrave;me de fa&ccedil;on ad&eacute;quate. Il &eacute;volue dans son projet en brulant des &eacute;tapes, ce qui l&apos;oblige &agrave; revenir au point de d&eacute;part et recommencer le travail initial.</p>
										</td>
										<td>
                                             <p>0</p>
										</td>
									</tr>
								</tbody>
							</table>
							
							<label class="control-label" for="advRev11">Note</label>
							<select id = "advRev11" class="form-control" name = "advRev11">
		                     <option value = 0 <?= (isset($data['review']) && $data['review']->advRev11="0") ? 'selected' : ''; ?>>0</option>
		                     <option value = 1 <?= (isset($data['review']) && $data['review']->advRev11="1") ? 'selected' : ''; ?>>1</option>
		                     <option value = 2 <?= (isset($data['review']) && $data['review']->advRev11="2") ? 'selected' : ''; ?>>2</option>
		                     <option value = 3 <?= (isset($data['review']) && $data['review']->advRev11="3") ? 'selected' : ''; ?>>3</option>
		                     <option value = 4 <?= (isset($data['review']) && $data['review']->advRev11="4") ? 'selected' : ''; ?>>4</option>
		                     <option value = 5 <?= (isset($data['review']) && $data['review']->advRev11="5") ? 'selected' : ''; ?>>5</option>
		                     <option value = 6 <?= (isset($data['review']) && $data['review']->advRev11="6") ? 'selected' : ''; ?>>6</option>
		                     <option value = 7 <?= (isset($data['review']) && $data['review']->advRev11="7") ? 'selected' : ''; ?>>7</option>
		                     <option value = 8 <?= (isset($data['review']) && $data['review']->advRev11="8") ? 'selected' : ''; ?>>8</option>
		                     <option value = 9 <?= (isset($data['review']) && $data['review']->advRev11="9") ? 'selected' : ''; ?>>9</option>
		                     <option value = 10 <?= (isset($data['review']) && $data['review']->advRev11="10") ? 'selected' : ''; ?>>10</option>
		                    </select>
		                   <br/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="advRev1">Commentaires</label>
							<p><?= (isset($data['review']->advComment1)) ? $data['review']->advComment1 : ''; ?></p>
						</div>
					</div>
					<h3 class="page-header">L&apos;&eacute;tudiant(e) applique judicieusement les principes, techniques et les m&eacute;thodes propres au domaine informatique.</h3>
					<h4>Capacit&eacute; &agrave; s&apos;approprier et &agrave; exploiter des technologies (/10)</h4>
						<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
										<th class="text-center">Cote</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sup&eacute;rieur</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) s&apos;adapte tr&egrave;s facilement aux technologies en place. Il &eacute;tudie et propose de fa&ccedil;on &eacute;clair&eacute;e les choix judicieux des technologies appropri&eacute;es.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Satisfaisant</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) s&apos;adapte aux technologies en place et propose les choix des technologies &agrave; utiliser.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Suffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) s&apos;adapte avec de l&apos;effort aux technologies en place et parvient avec difficult&eacute; &agrave; proposer les choix des technologies &agrave; utiliser.</p>
										</td>
										 <td>
                                            <p>6</p>
										</td>
									</tr>
									<tr>
										<td>Insuffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) a ne s&apos;adapte pas aux technologies en place et est incapable d&apos;envisager les choix des technologies &agrave; utiliser.</p>
										</td>
										<td>
                                            <p>0</p>
										</td>
									</tr>
								</tbody>
							</table>
							
							<label class="control-label" for="advRev21">Note</label>
							<select id = "advRev21" class="form-control" name = "advRev21">
		                     <option value = 0 <?= (isset($data['review']) && $data['review']->advRev21="0") ? 'selected' : ''; ?>>0</option>
		                     <option value = 1 <?= (isset($data['review']) && $data['review']->advRev21="1") ? 'selected' : ''; ?>>1</option>
		                     <option value = 2 <?= (isset($data['review']) && $data['review']->advRev21="2") ? 'selected' : ''; ?>>2</option>
		                     <option value = 3 <?= (isset($data['review']) && $data['review']->advRev21="3") ? 'selected' : ''; ?>>3</option>
		                     <option value = 4 <?= (isset($data['review']) && $data['review']->advRev21="4") ? 'selected' : ''; ?>>4</option>
		                     <option value = 5 <?= (isset($data['review']) && $data['review']->advRev21="5") ? 'selected' : ''; ?>>5</option>
		                     <option value = 6 <?= (isset($data['review']) && $data['review']->advRev21="6") ? 'selected' : ''; ?>>6</option>
		                     <option value = 7 <?= (isset($data['review']) && $data['review']->advRev21="7") ? 'selected' : ''; ?>>7</option>
		                     <option value = 8 <?= (isset($data['review']) && $data['review']->advRev21="8") ? 'selected' : ''; ?>>8</option>
		                     <option value = 9 <?= (isset($data['review']) && $data['review']->advRev21="9") ? 'selected' : ''; ?>>9</option>
		                     <option value = 10 <?= (isset($data['review']) && $data['review']->advRev21="10") ? 'selected' : ''; ?>>10</option>
		                    </select>
		                   <br/>
						</div>
					</div>
					
					<h4>Capacit&eacute; &agrave; produire des solutions informatiques (/20)</h4>
						<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
										<th class="text-center">Cote</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sup&eacute;rieur</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) est apte &agrave; programmer de fa&ccedil;on efficace une application de qualit&eacute; et  &agrave; valider avec rigueur le fonctionnement de l&apos;application. </p>
										</td>
										<td>
                                            <p>18-20</p>
										</td>
									</tr>
									<tr>
										<td>Satisfaisant</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) est apte &agrave; programmer une application de qualit&eacute; et &agrave; valider le fonctionnement de l&apos;application.</p>
										</td>
										<td>
                                            <p>14-17</p>
										</td>
									</tr>
									<tr>
										<td>Suffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) a rencontr&eacute; des difficult&eacute;s &agrave; programmer une application de qualit&eacute;, mais il y est arriv&eacute;. Il a besoin d&apos;&ecirc;tre encadr&eacute; afin de valider le fonctionnement de l&apos;application.</p>
										</td>
										 <td>
                                            <p>12-13</p>
										</td>
									</tr>
									<tr>
										<td>Insuffisant</td>
										<td>
                                            <p>Sans aide l&apos;&eacute;tudiant(e) n&apos;est pas apte &agrave; programmer une application de qualit&eacute; ni &agrave; valider le fonctionnement de l&apos;application. Les apprentissages de programmation ne sont pas int&eacute;gr&eacute;s.</p>
										</td>
										<td>
                                            <p>0</p>
										</td>
									</tr>
								</tbody>
							</table>
							
							<label class="control-label" for="advRev22">Note</label>
							<select id = "advRev22" class="form-control" name = "advRev22">
		                     <option value = 0 <?= (isset($data['review']) && $data['review']->advRev22="0") ? 'selected' : ''; ?>>0</option>
		                     <option value = 1 <?= (isset($data['review']) && $data['review']->advRev22="1") ? 'selected' : ''; ?>>1</option>
		                     <option value = 2 <?= (isset($data['review']) && $data['review']->advRev22="2") ? 'selected' : ''; ?>>2</option>
		                     <option value = 3 <?= (isset($data['review']) && $data['review']->advRev22="3") ? 'selected' : ''; ?>>3</option>
		                     <option value = 4 <?= (isset($data['review']) && $data['review']->advRev22="4") ? 'selected' : ''; ?>>4</option>
		                     <option value = 5 <?= (isset($data['review']) && $data['review']->advRev22="5") ? 'selected' : ''; ?>>5</option>
		                     <option value = 6 <?= (isset($data['review']) && $data['review']->advRev22="6") ? 'selected' : ''; ?>>6</option>
		                     <option value = 7 <?= (isset($data['review']) && $data['review']->advRev22="7") ? 'selected' : ''; ?>>7</option>
		                     <option value = 8 <?= (isset($data['review']) && $data['review']->advRev22="8") ? 'selected' : ''; ?>>8</option>
		                     <option value = 9 <?= (isset($data['review']) && $data['review']->advRev22="9") ? 'selected' : ''; ?>>9</option>
		                     <option value = 10 <?= (isset($data['review']) && $data['review']->advRev22="10") ? 'selected' : ''; ?>>10</option>
		                     <option value = 11 <?= (isset($data['review']) && $data['review']->advRev22="11") ? 'selected' : ''; ?>>11</option>
		                     <option value = 12 <?= (isset($data['review']) && $data['review']->advRev22="12") ? 'selected' : ''; ?>>12</option>
		                     <option value = 13 <?= (isset($data['review']) && $data['review']->advRev22="13") ? 'selected' : ''; ?>>13</option>
		                     <option value = 14 <?= (isset($data['review']) && $data['review']->advRev22="14") ? 'selected' : ''; ?>>14</option>
		                     <option value = 15 <?= (isset($data['review']) && $data['review']->advRev22="15") ? 'selected' : ''; ?>>15</option>
		                     <option value = 16 <?= (isset($data['review']) && $data['review']->advRev22="16") ? 'selected' : ''; ?>>16</option>
		                     <option value = 17 <?= (isset($data['review']) && $data['review']->advRev22="17") ? 'selected' : ''; ?>>17</option>
		                     <option value = 18 <?= (isset($data['review']) && $data['review']->advRev22="18") ? 'selected' : ''; ?>>18</option>
		                     <option value = 19 <?= (isset($data['review']) && $data['review']->advRev22="19") ? 'selected' : ''; ?>>19</option>
		                     <option value = 20 <?= (isset($data['review']) && $data['review']->advRev22="20") ? 'selected' : ''; ?>>20</option>
		                    </select>
		                   <br/>
						</div>
					</div>																
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="advRev2">Commentaires</label>
							<p><?= (isset($data['review']->advRev2)) ? $data['review']->advRev2 : ''; ?></p>
						</div>
					</div>		
					
					<h3 class="page-header">L&apos;&eacute;tudiant(e) agit de fa&ccedil;on professionnelle dans son milieu de travail.</h3>
					<h4>Autonomie dans l&apos;accomplissement de ses t&acirc;ches (/10)</h4>
						<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
										<th class="text-center">Cote</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sup&eacute;rieur</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) fait preuve d&apos;une autonomie et d&apos;une aisance dans la r&eacute;alisation de ses activit&eacute;s. Il s&apos;applique et s&apos;ajuste avec aisance dans la planification de ses t&acirc;ches.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Satisfaisant</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) fait preuve d&apos;une autonomie dans la r&eacute;alisation de ses activit&eacute;s et est r&eacute;aliste dans la planification de ses t&acirc;ches.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Suffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) a besoin de soutien occasionnel dans la r&eacute;alisation de ses activit&eacute;s et la planification de ses t&acirc;ches.</p>
										</td>
										 <td>
                                            <p>6</p>
										</td>
									</tr>
									<tr>
										<td>Insuffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) a besoin de soutien occasionnel dans la r&eacute;alisation de ses activit&eacute;s et la planification de ses t&acirc;ches.</p>
										</td>
										<td>
                                            <p>0</p>
										</td>
									</tr>
								</tbody>
							</table>
							
							<label class="control-label" for="advRev31">Note</label>
							<select id = "advRev31" class="form-control" name = "advRev31">
		                     <option value = 0 <?= (isset($data['review']) && $data['review']->advRev31="0") ? 'selected' : ''; ?>>0</option>
		                     <option value = 1 <?= (isset($data['review']) && $data['review']->advRev31="1") ? 'selected' : ''; ?>>1</option>
		                     <option value = 2 <?= (isset($data['review']) && $data['review']->advRev31="2") ? 'selected' : ''; ?>>2</option>
		                     <option value = 3 <?= (isset($data['review']) && $data['review']->advRev31="3") ? 'selected' : ''; ?>>3</option>
		                     <option value = 4 <?= (isset($data['review']) && $data['review']->advRev31="4") ? 'selected' : ''; ?>>4</option>
		                     <option value = 5 <?= (isset($data['review']) && $data['review']->advRev31="5") ? 'selected' : ''; ?>>5</option>
		                     <option value = 6 <?= (isset($data['review']) && $data['review']->advRev31="6") ? 'selected' : ''; ?>>6</option>
		                     <option value = 7 <?= (isset($data['review']) && $data['review']->advRev31="7") ? 'selected' : ''; ?>>7</option>
		                     <option value = 8 <?= (isset($data['review']) && $data['review']->advRev31="8") ? 'selected' : ''; ?>>8</option>
		                     <option value = 9 <?= (isset($data['review']) && $data['review']->advRev31="9") ? 'selected' : ''; ?>>9</option>
		                     <option value = 10 <?= (isset($data['review']) && $data['review']->advRev31="10") ? 'selected' : ''; ?>>10</option>
		                    </select>
		                   <br/>
						</div>
					</div>
					
					<h4>Qualit&eacute; des relations interpersonnelles et communication(/10)</h4>
					<div class="row">
						<div class="col-md-12">
							<table class="table well">
								<thead>
									<tr>
										<th>Critère</th>
										<th class="text-center">Évaluation</th>
										<th class="text-center">Cote</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Sup&eacute;rieur</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) s&apos;adapte avec aisance &agrave; des situations de travail vari&eacute;es. Il communique de fa&ccedil;on claire et parvient &agrave; vulgariser facilement ses solutions.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Satisfaisant</td>
										<td>
											<p>L&apos;&eacute;tudiant(e) s&apos;adapte &agrave; des situations de travail vari&eacute;es et communique de fa&ccedil;on ad&eacute;quate ses solutions.</p>
										</td>
										<td>
                                            <p>9-10</p>
										</td>
									</tr>
									<tr>
										<td>Suffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) s&apos;adapte avec de l&apos;aide &agrave; des situations de travail vari&eacute;es et r&eacute;ussi &agrave; communiquer avec un soutient minimal ses solutions.</p>
										</td>
										 <td>
                                            <p>6</p>
										</td>
									</tr>
									<tr>
										<td>Insuffisant</td>
										<td>
                                            <p>L&apos;&eacute;tudiant(e) r&eacute;agit avec rigidit&eacute; &agrave; des situations de travail vari&eacute;es et ne r&eacute;ussit pas &agrave; communiquer ad&eacute;quatement ses solutions.</p>
										</td>
										<td>
                                            <p>0</p>
										</td>
									</tr>
								</tbody>
							</table>
							
							<label class="control-label" for="advRev32">Note</label>
							<select id = "advRev32" class="form-control" name = "advRev32">
		                     <option value = 0 <?= (isset($data['review']) && $data['review']->advRev32="0") ? 'selected' : ''; ?>>0</option>
		                     <option value = 1 <?= (isset($data['review']) && $data['review']->advRev32="1") ? 'selected' : ''; ?>>1</option>
		                     <option value = 2 <?= (isset($data['review']) && $data['review']->advRev32="2") ? 'selected' : ''; ?>>2</option>
		                     <option value = 3 <?= (isset($data['review']) && $data['review']->advRev32="3") ? 'selected' : ''; ?>>3</option>
		                     <option value = 4 <?= (isset($data['review']) && $data['review']->advRev32="4") ? 'selected' : ''; ?>>4</option>
		                     <option value = 5 <?= (isset($data['review']) && $data['review']->advRev32="5") ? 'selected' : ''; ?>>5</option>
		                     <option value = 6 <?= (isset($data['review']) && $data['review']->advRev32="6") ? 'selected' : ''; ?>>6</option>
		                     <option value = 7 <?= (isset($data['review']) && $data['review']->advRev32="7") ? 'selected' : ''; ?>>7</option>
		                     <option value = 8 <?= (isset($data['review']) && $data['review']->advRev32="8") ? 'selected' : ''; ?>>8</option>
		                     <option value = 9 <?= (isset($data['review']) && $data['review']->advRev32="9") ? 'selected' : ''; ?>>9</option>
		                     <option value = 10 <?= (isset($data['review']) && $data['review']->advRev32="10") ? 'selected' : ''; ?>>10</option>
		                    </select>
		                   <br/>
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-12">
							<label class="control-label" for="advComment3">Commentaires</label>
							<p><?= (isset($data['review']->advComment3)) ? $data['review']->advComment3 : ''; ?></p>
						</div>
					</div>						
				</div>
			</div>
	</div>
</div>