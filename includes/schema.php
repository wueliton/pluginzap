<?php
	$estrelas = rand(3, 4).'.'.rand(0, 9);
	$coments = rand(30, 60);
	
	$criacao = date("Y/m/d\Th:i:s", filemtime($urlPagina));
	$edicao =  date("Y/m/d\Th:i:s", strtotime("+10 days",filemtime($urlPagina)));

	$img_card = "assets/images/palavras-chave/thumbs/".$imagem;

	if (!is_file($img_card)) {
		$img_card = $card;
	}

	?>
	<script type="application/ld+json">
	{
	    "@context":"https://schema.org",
	    "@graph":[ {
	        "@type":"WebSite",
	        "@id":"<?=$url?>#website",
	        "url":"<?=$url?>",
	        "name":<?=json_encode($nomeEmpresa)?>,
	        "potentialAction": {
	            "@type":"SearchAction",
	            "target":"<?=$url?>?s={search_term_string}",
	            "query-input": "required name=search_term_string"
	        }
	    }
	    ,
	    {
	        "@type":"WebPage",
	        "@id":"<?=$url?>telha-trapezoidal-para-fechamento/",
	        "url":"<?=$url?>telha-trapezoidal-para-fechamento/",
	        "inLanguage":"pt-BR",
	        "name":<?=json_encode($nomeEmpresa)?>,
	        "isPartOf": {
	            "@id": "<?=$url?>#website"
	        }
	        ,
	        "datePublished":"<?=$criacao?>+00:00",
	        "dateModified":"<?=$edicao?>+00:00"
	    }
	    ]
	}
	</script>
	<script type="application/ld+json">
	{
		"@context" : "http://schema.org",
		"@type" : "Organization",
		"name" : <?=json_encode($nomeEmpresa);?>,
		"url" : "<?=$url;?>",
		"sameAs" : [
<?php echo isset($linkface) && $linkface!="" ? "			\"$linkface\",\n" : ""?>
<?php echo isset($linkinstagram) && $linkinstagram!="" ? "			\"$linkinstagram\",\n" : ""?>
<?php echo isset($linktwitter) && $linktwitter!="" ? "			\"$linktwitter\",\n" : ""?>
<?php echo isset($linkedin) && $linkedin!="" ? "			\"$linkedin\",\n" : ""?>
<?php echo isset($linkgoogle) && $linkgoogle!="" ? "			\"$linkgoogle\",\n" : ""?>
<?php echo isset($linkYoutube) && $linkYoutube!="" ? "			\"$$linkYoutube\",\n" : ""?>
			"<?=$url?>"
		],
		"address": {
			"@type": "PostalAddress",
			"streetAddress": <?=json_encode($endereco)?>,
			"addressRegion": <?=json_encode($uf)?>,
			"postalCode": <?=json_encode($cep)?>,
			"addressCountry": "BR"
		}
	}
	</script>

	<script type="application/ld+json">
		{
			"@context": "http://www.schema.org",
			"@type": "Corporation",
			"name": <?=json_encode($nomeEmpresa)?>,
			"url": "<?=$url?>",
			"logo": "<?=$url.$logoSchema?>",
			"image": "<?=$url.$img_card?>",
			"telephone": "55<?=$tel?>",
			"email": "<?=$email?>",
			"description": <?=json_encode($description)?>,
			"address": {
				"@type": "PostalAddress",
				"streetAddress": <?=json_encode($endereco)?>,
				"addressLocality": <?=json_encode($cidade)?>,
				"addressRegion": <?=json_encode($uf)?>,
				"addressCountry": "BR"
			},
		
			"aggregateRating": {
				"@type": "aggregateRating",
				"ratingValue": "<?=$estrelas?>",
				"reviewCount": "<?=$coments?>"
			}
		}
	</script>

	<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "LocalBusiness",
		  "name": <?=json_encode($nomeEmpresa)?>,
		  "image": "<?=$url.$img_card?>",
		  "@id": "<?=$canonical?>",
		  "url": "<?=$canonical?>",
		  "telephone": "55<?=$tel?>",
		  "priceRange": "$$",
		  "address": {
		    "@type": "PostalAddress",
		    "streetAddress": <?=json_encode($endereco)?>,
		    "addressLocality": <?=json_encode($cidade)?>,
		    "postalCode": "<?=$cep?>",
		    "addressCountry": "BR"
		  },
		  "geo": {
		    "@type": "GeoCoordinates",
		    "latitude": <?=$geoLongitude?>,
		    "longitude": <?=$geoLatitude?>
		  } ,
		  "sameAs": [
<?php echo isset($linkface) && $linkface!="" ? "			\"$linkface\",\n" : ""?>
<?php echo isset($linkinstagram) && $linkinstagram!="" ? "			\"$linkinstagram\",\n" : ""?>
<?php echo isset($linktwitter) && $linktwitter!="" ? "			\"$linktwitter\",\n" : ""?>
<?php echo isset($linkedin) && $linkedin!="" ? "			\"$linkedin\",\n" : ""?>
<?php echo isset($linkgoogle) && $linkgoogle!="" ? "			\"$linkgoogle\",\n" : ""?>
<?php echo isset($linkYoutube) && $linkYoutube!="" ? "			\"$$linkYoutube\",\n" : ""?>
		    "<?=$url?>"
		  ]
		}
	</script>

	<script type='application/ld+json'>
		{
			"@context": "http://www.schema.org",
			"@type": "product",
			"brand": <?=json_encode($nomeEmpresa)?>,
			"logo": "<?=$url.$logoSchema?>",
			"name": <?=json_encode($title)?>,
			"category": "Widgets",
			"image": "<?=$url.$img_card?>",
			"description": <?=json_encode($description)?>,
			"aggregateRating": {
				"@type": "aggregateRating",
				"ratingValue": "<?=$estrelas?>",
				"reviewCount": "<?=$coments?>"
			}
		}
	</script>

	<script type="application/ld+json">
		{
			"@context": "http://schema.org/",
			"@type": "Recipe",
			"mainEntityOfPage": "<?=$canonical?>",
			"name": <?=json_encode($title)?>,
			"image": "<?=$url.$img_card?>",
			"author": {
				"@type":"Person",
				"name":<?=json_encode($nomeEmpresa)?>
			},
			"datePublished": "<?=$criacao?>",
			"dateModified": "<?=$edicao?>",
			"description": <?=json_encode($description)?>,
			"aggregateRating": {
				"@type": "AggregateRating",
				"ratingValue": "<?=$estrelas?>",
				"reviewCount": "<?=$coments?>"
			},
			"publisher": {
				"@type": "Organization",
				"name": "<?=$author?>",
				"logo": "<?=$url.$logoSchema?>"
			}
		}
	</script>

	<script type="application/ld+json">
		{
		    "@context": "https://schema.org",
		    "@type": "TechArticle",
		    "url": "<?=$canonical?>",
		    "name": <?=json_encode($title)?>,
		    "description": <?=json_encode($description)?>,
		    "mainEntityOfPage": "<?=$canonical?>",
		    "headline": <?=json_encode($title)?>,
		    "alternativeHeadline": <?=json_encode($title." - ".$nomeEmpresa)?>,
		    "proficiencyLevel": "Expert",
		    "datepublished": "<?=$criacao?>",
    		"datemodified": "<?=$edicao?>",
    		"keywords": <?=json_encode($keywords)?>,
    		"genre": <?=json_encode("empresa ".$ramo." online, empresa de ".$ramo)?>,
		    "inLanguage": "pt_BR",
		    "publisher": {
		        "@context": "https://schema.org",
		        "@type": "Organization",
		        "url": "<?=$url?>",
		        "name": <?=json_encode($nomeEmpresa)?>,
		        "alternateName": <?=json_encode($title." - ".$nomeEmpresa)?>,
		        "description": <?=json_encode($description)?>,
		        "logo": {
		            "@context": "https://schema.org",
		            "@type": "ImageObject",
		            "url": "<?=$url.$card?>",
		            "width": 200,
		            "height": 200
		        }
		    },
		    "author": [
		        {
		            "@context": "https://schema.org",
		            "@type": "Person",
		            "url": "<?=$url?>",
		            "name": <?=json_encode($nomeEmpresa)?>,
		            "description": <?=json_encode($description)?>
		        }
		    ],
		    "image": [
		        {
		            "@context": "https://schema.org",
		            "@type": "ImageObject",
		            "url": "<?=$url.$img_card?>",
		            "width": 200,
		            "height": 200
		        }
		    ]
		}
	</script>

	<script type="application/ld+json">
		{
			"@context": "https://schema.org/",
			"@type": "BreadcrumbList",
			"itemListElement": [{
				"@type": "ListItem",
				"position": 1, 
				"name": <?=json_encode($nomeEmpresa)?>,
				"item": "<?=$url?>"
			},{
				"@type": "ListItem",
				"position": 2,
				"name": "Mapa Site",
				"item": "<?=$url?>mapa-site"
			},{
				"@type": "ListItem",
				"position": 3,
				"name": <?=json_encode($title)?>,
				"item": "<?=$canonical?>"
			}]
		}
	</script>