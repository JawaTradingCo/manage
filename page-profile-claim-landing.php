<?php
/**
 * @package WordPress
 * @subpackage doxo
 */

/*
Template Name: Profile Claim Landing Page
*/

$imageFolder = get_bloginfo( 'template_url' ) . "/images/landers/profile/";
?>

<?php get_header("responsive"); ?>

<link rel="stylesheet" href="<? echo get_bloginfo( 'template_url' ); ?>/css/landing_profile.css" type="text/css" media="screen"/>

<div id="main" class="container">
	<div class="row">
		<div class="col-sm-12">

			<div class="user_content">

				<!-- start 0th row -->
				<div class="row zero-row">
					<div class="col-sm-12">
						<h3>doxo network of bill pay providers</h3>
					</div>
				</div>


				<hr/>
				<!-- end 0th row -->
				<!-- start 1st row -->
				<div class="row first-row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h3>Claim and get verified for your doxo profile!</h3> <img src="<? echo $imageFolder; ?>form.png"/>
						<p>By clicking the button below, you represent that you have authority to claim this account on behalf of this business and agree to doxo’s terms of service and privacy agreement. </p>
						<button class="btn btn-blue">Claim Your Profile</button>
					</div>
					<div class="col-sm-2"></div>
				</div>

				<!-- end 1st row -->
				<!-- start 2nd row -->
				<div class="row second-row">
					<div class="col-md-12">
						<h3><strong>millions of people</strong> turn to doxo every month to pay their bills</h3>
					</div>
					<div class="col-sm-4 icon-container">
						<div class="col-sm-12">
							<div class="icon" style="background-image:url(<? echo $imageFolder; ?>icon-laptop.png);"></div>
						</div>
						<div class="col-sm-12">
							doxo users can pay ALL of their billers from one login on the doxo network.
						</div>
					</div>
					<div class="col-sm-4 icon-container">
						<div class="col-sm-12">
							<div class="icon" style="background-image:url(<? echo $imageFolder; ?>icon-card-lock.png);"></div>
						</div>
						<div class="col-sm-12">
							doxo users have multiple options to pay (debit card, credit card, and bank account) secured by doxo’s best-in-class technology.
						</div>
					</div>
					<div class="col-sm-4 icon-container">
						<div class="col-sm-12">
							<div class="icon" style="background-image:url(<? echo $imageFolder; ?>icon-smartphone.png);"></div>
						</div>
						<div class="col-sm-12">
							doxo network of billers profiles is fully mobilefriendly and works on ANY device.
						</div>
					</div>
				</div>
				<!-- end 2nd row -->
				<!-- start 3rd row -->
				<div class="row third-row">
					<div class="col-sm-12">
						<h3>How does your <strong>doxo profile</strong> work?</h3>

					</div>
					<div class="col-sm-12">
						<div class="col-sm-4">
							<div class="col-sm-12 tab-btn active" data-id="1">How do users pay?</div>
							<div class="col-sm-12 tab-btn" data-id="2">Can you update contact information?</div>
							<div class="col-sm-12 tab-btn" data-id="3">What are follows?</div>
							<div class="col-sm-12 tab-btn" data-id="4">What is Market Data?</div>
							<div class="col-sm-12 tab-btn" data-id="5">How do I change the FAQ?</div>
						</div>
						<div class="col-sm-8 pane-container">
							<div class="pane pane1 active">
								<div class="col-sm-6">
									<strong>How bill pay works</strong>
									<p>Payments arrive to billers from doxo users the same way you receive online bank bill payments.</p>
									<button class="btn btn-blue">Claim Your Profile</button>
								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="<? echo $imageFolder; ?>tabarea-computer.png"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="pane pane2">
								<div class="col-sm-6">
									<strong>Lipsum One</strong>
									<p>Quisque dictum aliquam augue, at cursus dolor pharetra non. Praesent sit amet magna neque. Integer eget nibh iaculis, porttitor leo sed, tempus magna. Phasellus lacinia vestibulum metus, id tempor tellus bibendum quis. Pellentesque id posuere enim, eget mattis urna. In hac habitasse platea dictumst. Mauris accumsan id quam nec aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sagittis porttitor mi a laoreet. Duis sagittis lectus neque, sed ullamcorper felis tristique eu. Fusce et tortor quis est bibendum malesuada id a arcu. Integer vehicula massa vitae lacus facilisis interdum.</p>

								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="<? echo $imageFolder; ?>tabarea-computer.png"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="pane pane3">
								<div class="col-sm-6">
									<strong>Lipsum Two</strong>
									<p>Quisque dictum aliquam augue, at cursus dolor pharetra non. Praesent sit amet magna neque. Integer eget nibh iaculis, porttitor leo sed, tempus magna. Phasellus lacinia vestibulum metus, id tempor tellus bibendum quis. Pellentesque id posuere enim, eget mattis urna. In hac habitasse platea dictumst. Mauris accumsan id quam nec aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sagittis porttitor mi a laoreet. Duis sagittis lectus neque, sed ullamcorper felis tristique eu. Fusce et tortor quis est bibendum malesuada id a arcu. Integer vehicula massa vitae lacus facilisis interdum.</p>

								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="<? echo $imageFolder; ?>tabarea-computer.png"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="pane pane4">
								<div class="col-sm-6">
									<strong>Lipsum Three</strong>
									<p>Quisque dictum aliquam augue, at cursus dolor pharetra non. Praesent sit amet magna neque. Integer eget nibh iaculis, porttitor leo sed, tempus magna. Phasellus lacinia vestibulum metus, id tempor tellus bibendum quis. Pellentesque id posuere enim, eget mattis urna. In hac habitasse platea dictumst. Mauris accumsan id quam nec aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sagittis porttitor mi a laoreet. Duis sagittis lectus neque, sed ullamcorper felis tristique eu. Fusce et tortor quis est bibendum malesuada id a arcu. Integer vehicula massa vitae lacus facilisis interdum.</p>

								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="<? echo $imageFolder; ?>tabarea-computer.png"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="pane pane5">
								<div class="col-sm-6">
									<strong>Lipsum Four</strong>
									<p>Quisque dictum aliquam augue, at cursus dolor pharetra non. Praesent sit amet magna neque. Integer eget nibh iaculis, porttitor leo sed, tempus magna. Phasellus lacinia vestibulum metus, id tempor tellus bibendum quis. Pellentesque id posuere enim, eget mattis urna. In hac habitasse platea dictumst. Mauris accumsan id quam nec aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sagittis porttitor mi a laoreet. Duis sagittis lectus neque, sed ullamcorper felis tristique eu. Fusce et tortor quis est bibendum malesuada id a arcu. Integer vehicula massa vitae lacus facilisis interdum.</p>

								</div>
								<div class="col-sm-6">
									<img class="img-responsive" src="<? echo $imageFolder; ?>tabarea-computer.png"/>
								</div>
								<div class="clearfix"></div>
							</div>

						</div>


					</div>
				</div>

				<!-- end 3rd row -->

				<!-- start 4th row -->
				<div class="row fourth-row">
					<div class="col-sm-8">
						<h3><strong>More ways to participate</strong> in the doxo network</h3>

					</div>
					<div class="col-sm-4">
						<div class="star-box rocket-box pull-right">
							<div class="col-sm-12">
								<h3>connect provider</h3>
							</div>
							<div class="col-sm-12">doxo can be your all-in-one bill pay. Speak with a doxo specialist to learn more. </div>
							<div class="col-sm-12"><button class="btn btn-default">connect today</button>
							</div>

						</div>
						<div class="clearfix"></div>
						<div class="col-sm-12 pull-right rocket0"><img class="img-responsive" src="<? echo $imageFolder; ?>rocket-with-flame.png"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4 ">
							<div class="star-box star-box1">
								<div class="star"></div>
								<div class="col-sm-12">
									<h3>free profile</h3>
								</div>
								<div class="col-sm-12">doxo is a crowdsourced, user community network of billers. Billers are added by doxo users. Claim your profile to update and get more for FREE with doxo.</div>
								<div class="col-sm-12"><button class="btn btn-success">claim your profile</button>
								</div>
							</div>
							<div class="col-sm-12 rocket1"><img class="img-responsive" src="<? echo $imageFolder; ?>rocket.png"/>
							</div>

						</div>

						<div class="col-sm-4 ">
							<div class="star-box star-box2">
								<div class="star"></div>
								<div class="col-sm-12">
									<h3>claimed provider</h3>
								</div>
								<div class="col-sm-12">As a doxo claimed provider you benefit with:</div>
								<div class="col-sm-12 checkcontainer">
									<div class="col-sm-12"><img class="check" src="<? echo $imageFolder; ?>check.png"/> Update your doxo profile.</div>
									<div class="col-sm-12"><img class="check" src="<? echo $imageFolder; ?>check.png"/> View Customer payments.</div>
									<div class="col-sm-12"><img class="check" src="<? echo $imageFolder; ?>check.png"/> Get paid faster with direct deposit.</div>

								</div>

							</div>
							<div class="col-sm-12 rocket2"><img class="img-responsive" src="<? echo $imageFolder; ?>rocket.png"/>
							</div>
						</div>


					</div>
					<div class="col-sm-12 exhaust">
						<img class="img-responsive" src="<? echo $imageFolder; ?>bg-exhaust.png"/>
					</div>
					<div class="col-sm-12 checkboxes">
						<div class="col-sm-3">All levels include:</div>
						<div class="col-sm-3"><img class="check large" src="<? echo $imageFolder; ?>check.png"/> free cancelations</div>
						<div class="col-sm-3"><img class="check large" src="<? echo $imageFolder; ?>check.png"/> free profile </div>
						<div class="col-sm-3"><img class="check large" src="<? echo $imageFolder; ?>check.png"/> no long term commitment</div>

					</div>
				</div>

				<!-- end 4th row -->

				<!-- start 5th row -->
				<div class="row fifth-row">
					<div class="col-sm-12">
						<h3><strong>Check out doxo’s frequently asked questions</strong> <button class="btn btn-warning">FAQ</button></h3>
					</div>

				</div>

				<!-- end 5th row -->

				<!-- start 6th row -->
				<div class="row sixth-row">
					<div class="col-sm-12">
						<h3><strong>doxo Network is Everywhere</strong></h3>
						<p>Click on the map to search by state and industry for real-time market share data.
						</p>
					</div>
					<div class="col-sm-12">
						<img class="map" src="<? echo $imageFolder; ?>usa.png"/>
					</div>
				</div>

				<!-- end 6th row -->

				<!-- start 7th row -->
				<div class="row seventh-row">
					<div class="col-sm-12">
						<h3><strong>Claim</strong> your doxo network profile today <button class="btn btn-warning">Get Started</button></h3>
					</div>

				</div>

				<!-- end 7th row -->


			</div>

		</div>
		<? /* /.col-sm-9 */ ?>


	</div>
</div>
<script>
	/* code for tab panel */
	jQuery( document ).ready( function () {
		jQuery( ".tab-btn" ).on( "click", function () {
			jQuery( ".tab-btn" ).removeClass( "active" );
			jQuery( this ).addClass( "active" );
			jQuery( ".pane.active" ).removeClass( "active" );
			jQuery( ".pane" + jQuery( this ).attr( "data-id" ) ).addClass( "active" );
		} )

	} )
</script>
<?php get_footer('responsive'); ?>