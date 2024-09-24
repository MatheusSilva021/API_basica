API básica feita em Laravel. Estava estudando sobre APIs em Laravel e achei uma boa ideia fazer uma pequena API com o tema "Loja de Roupas".
Rotas da API:

	 - Get
		/products : retorna todos produtos
		/sizes : retorna todos tamanhos
		/categories : retorna todas categorias
		/product/{id} : retorna um produto especifico
	
	 - Post
		/sizeInsert : Insere um novo tamanho, necessário: String Size,
								  String Abbreviation.
											   
		/categoryInsert: Insere uma nova categoria, necessário: String category_Name.
		
		/productInsert: Insere um novo produto, necessário: 
		String product_Name,
		String product_Description,
		String quantity_in_stock,
		Double Price,
		Int Discount,
		String product_Sizes,
		String product_Categories,
		File product_Images.
	
	- Put
		/sizeUpdate/{id} : Atualiza um tamanho
		/categoryUpdate/{id} : Atualiza uma categoria
		/productUpdate/{id} : Atualiza um produto
	
	- Delete
		/sizeDelete/{id} : Deleta um tamanho
		/categoryDelete/{id} : Deleta uma categoria
		/productDelete/{id} : Deleta um produto
