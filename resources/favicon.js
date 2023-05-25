var favicons = [
				"resources/fav2.png",
				"resources/fav3.png",
				"resources/fav4.png",
				"resources/fav1.png"
			];

			var i = 0;

			setInterval(function(){
				var link = document.querySelector("link[rel~='icon']");
				if (link){
					link.href = favicons[i];
					i++;
					if (i >= favicons.length){
					i = 0;
					}
				}
			}, 1300);