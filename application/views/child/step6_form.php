				<div class="datelist datelist00 bold">
                    <?php
					$action_num = (int)str_replace('step','',$action);
					if($action_num!=6&&$action_num!=11){
						$display = 'display:none;';	
					}else{
						$display = '';	
					}
					?>
					<h2 style="width:380px;<?php echo $display;?>">個人情報利用について (プライバシーポリシー)</h2>
					<div class="databox" style="<?php echo $display;?>">
						<div class="databox01">
							<p>当園は、個人情報保護の重要性を認識し、個人情報保護の方針を定めるとともに、全社一丸となり個人情報の適切な保護に努めます。個人情報の収集、利用に関する基本原則、管理方法ならびに実効性を持たせる手段として教育・訓練、監査等について以下のとおり規定し、実行して参ります。</p>
							<h4>個人情報の収集、利用、提供等に関する基本原則</h4>
							<p>個人情報を直接収集する際は、適法かつ公正な手段により、本人の同意を得た上で行います。</p>
							<p>収集にあたっては、利用目的を明確にし、その目的のために必要な範囲内にとどめます。</p>
							<p>個人の利益を侵害する可能性が高い機微な情報は、本人の明確な同意がある場合または法令等の裏付けがある場合以外には収集しません。</p>
							<p>当園が個人情報の処理を伴う業務を外部から受託する場合や外部へ委託する場合は、個人情報に関する秘密の保持、再委託に関する事項、事故時の責任分担、契約終了時の個人情報の返却および消去等について定め、それに従います。</p>
							<p>個人情報は、本人の同意を得た範囲内で利用、提供します。</p>
							<h4>個人情報の管理について</h4>
							<p>当園が直接収集または外部から業務を受託する際に入手した個人情報は、正確な状態に保ち、不正アクセス、紛失・破壊・改ざんおよび漏洩等を防止するための措置を講じます。</p>
							<p>個人情報の処理を伴う業務を外部から受託する場合は、委託者が個人情報を入手した際、本人の同意を得た上で、適法かつ公正な手段によって収集したものであることを確認します。</p>
							<h4>法令及びその他の規範について</h4>
							<p>当園は、個人情報の保護に関係する日本の法令及びその他の規範を遵守し、本方針の継続的改善に努めます。</p>
							<h4>本人からのお問合せ</h4>
							<p>本人からの個人情報の取扱いに関するお問い合わせには、妥当な範囲において、すみやかな対応に努めます。</p>
						</div>
					</div>
					<div class="datatxt" style="<?php echo $display;?>"><input name="checkbox_Agree" class="checkbox01 validate[required]" id="" type="checkbox" value="1" <?php if(!empty($child_Info)&&array_key_exists('Agree',$child_Info)){if($child_Info['Agree']) echo 'checked';;}?>/><strong>上記「プライバシーポリシー」に同意する</strong></div>
					<h2 style="width:190px;">園 に 対 す る 希 望</h2>
					<div class="databox">
						<h3><i>お子さまの教育や園生活について、園に望まれることがありましたら、何でもお書きください。</i></h3>
						<ul>
							<li><textarea name="txt_Agree_Hope" rows="" cols="" ><?php if(!empty($child_Info)&&array_key_exists('Agree_Hope',$child_Info)){echo $child_Info['Agree_Hope'];}?></textarea></li>
						</ul>
					</div>
					<h2 style="width:60px;">補 記</h2>
					<div class="databox">
						<ul>
							<li><textarea name="txt_Agree_Remark" rows="" cols=""><?php if(!empty($child_Info)&&array_key_exists('Agree_Remark',$child_Info)){echo $child_Info['Agree_Remark'];}?></textarea></li>
						</ul>
					</div>
				</div>