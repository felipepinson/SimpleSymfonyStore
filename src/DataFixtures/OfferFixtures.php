<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductDetails;
use App\Entity\ProductCategory;
use App\Entity\Details;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrayProducts = [
            'Colcha de Piquet Queen' => [
                'Title' => 'Colcha de Piquet Queen 240x260 Bege Beca Decor',
                'Des' => 'Como a principal atração do quarto, é imprescindível que a cama esteja sempre bem arruma. 
                            Confeccionada em algodão e poliéster, 
                            a colcha Piquet queen, além de dar cara nova ao seu cantinho de aconchego, 
                            vai deixa-lo ainda mais aconchegante.',
                'Image' => 'Beca-Decor-Colcha-de-Piquet-Queen-240x260-Bege-Beca.jpg',
                'Price' => "106.99",
                'Text' => "Cor	Bege
                        Garantia	3 Meses
                        Conteúdo da Embalagem	1 Colcha e  Portas Travesseiros
                        Modelo	Piquet
                        Material	Tecido 56 % Algodão e 44% Poliéster
                        Descrição do Tamanho	240x260
                        Necessita Montagem?	Não",
                'category' => [
                    '1', '4'
                ]
            ],
            'Toalha de Mesa Retangular' => [
                'Title' => 'Toalha de Mesa Retangular 1,40 x 2,10 Clean Athenas Döhler - Evely',
                'Des' => 'Linda toalha retangular...',
                'Image' => 'Dohler-Toalha-de-Mesa-Retangular-12C40-x-22C10-Clean-Athenas.jpg',
                'Price' => "44.9",
                'Text' => "Cor	Bege
                    Instruções/Cuidados	Seguir instruções de lavagem no verso da embalagem.
                    Conteúdo da Embalagem	01 Toalha de Mesa 1,40 x 2,10 - 06 Lugares
                    Modelo	137020
                    Material	Algodão
                    Descrição do Tamanho	210 x 140
                    Capacidade (kg)	Até 1kg",
                'category' => [
                    '2'
                ]
            ],
            'Painel para TV 50 Polegadas' => [
                'Title' => 'Painel para TV 50 Polegadas Zeus Natural e Off White 184 cm',
                'Des' => 'Nada como reunir toda a família para assistir aos seus programas 
                    favoritos, não é mesmo? Então, uma boa ideia para deixar a 
                    sua sala de estar ainda mais elegante e sofisticada é o Painel 
                    para TV Zeus. O modelo atraente e moderno conta com espaço para acomodar 
                    pequenos aparelhos eletrônicos ou até mesmo objetos decorativos. 
                    Ele é ideal para completar o espaço com beleza e charme, 
                    né? Chique demais!',
                'Image' => 'Painel-Off.jpg',
                'Price' => "569.99",
                'Text' => "Cor	Marrom
                    Garantia	3 Meses
                    Instruções/Cuidados	Limpar apenas com um pano úmido com água. Fixação é de forma mão amiga.
                    Conteúdo da Embalagem	1 Painel Para Tv (Não Acompanha Suporte Para Tv) 
                    Indicamos O Uso de Um Suporte Fixo. - Entregue em: 2 Volumes
                    Modelo	Zeus
                    Material	MDP
                    Descrição do Tamanho	Altura: 161 cm Largura: 184 cm Profundidade: 38 cm
                    Necessita Montagem?	Sim, sugerimos a contratação do nosso serviço de montagem 
                    (para os CEPs em que o serviço está disponível) ou de algum profissional 
                    experiente de sua preferência
                    Características Especiais	Com Porta
                    Dimensões aproximadas do espaço para TV (Larg x Alt)	180 x 95
                    Suporta até (kg)	35.00
                    Ideal para TVs de até (polegadas)	50",
                'category' => [
                    4, 5, 3
                ]
            ],
        ];

        foreach ($arrayProducts as $name => $value) {
            $product = new Product();
            $product->setName($name);
            $product->setDes($value['Des']);
            $product->setImage($value['Image']);
            $product->setPrice($value['Price']);
            $product->setStat(1);
            $manager->persist($product);
            
            $details = new Details();
            
            $details->setTitle($value['Title']);
            $details->setText($value['Text']);
            $details->setStat(1);
            $manager->persist($details);
            
            $productDetails = new ProductDetails();
            
            $productDetails->setDetails($details);
            $productDetails->setProduct($product);
            $productDetails->setStat(1);
            $manager->persist($productDetails);
            
            foreach ($value['category'] as $idCat) {
                $objCat = $manager->find(\App\Entity\Category::class, $idCat);
                
                $pcat = new ProductCategory();
                $pcat->setCategory($objCat);
                $pcat->setProduct($product);
                $manager->persist($pcat);
            }
        }
        
        $manager->flush();
    }
}
