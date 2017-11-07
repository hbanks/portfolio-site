#Deadset

A reworking of the amazing [semantic.gs](https://github.com/tylertate/semantic.gs/) system. Instead of margin to define columns, columns are a full width and content is defined via padding.

**Because fuck presentational classes**

##How To Use
Simply include the _deadset file within the appropriate language to your project as an include.

Create a structure as normal and wrap each structural section with a containing class, in this case the class is 'row' but the class names are arbitrary. On that class, apply the mixin of row.

For each section of content, apply the column mixin and supply the number of columns you want the element to span.

Example:

**HTML**

	<div class="wrapper">

		<div class="row">
		
			<header class="top">			
				// Header Content goes here \\
			</header>
			
		</div>

		<div class="row">
		
			<section class="content">
				// Content Goes here \\
			</section>
			
			<aside class="sidebar">
				// Sidebar content goes here \\
			</aside>
			
		</div>
		
**SCSS**

	.wrapper {
		max-width: 1080px;
		margin: 0 auto;
	}

	.row {
		@include row();
	}

	header.top {
		@include column(12);
	}

	section.content {
		@include column(8);
	}

	aside.sidebar {
		@include column(4);
	}

###Making things responsive.
By default, the columns are set by percentage. Therefore if you want to change things on different devices, simply use a media query and provide a new value to the mixin.

**SCSS**

	@media all and (max-width: 480) {
		section.content {
			@include column(12);
		}	
	}
	
##Fork it, change it , do what you will. Just make awesome shit.

[drewminns.com](drewminns.com) made this

[@drewisthe](http://twitter.com/drewisthe)