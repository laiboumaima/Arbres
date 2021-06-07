<h1> {{ $arbre->name }}</h1>
        @foreach($elems as $elem)

 <h1> {{ $elem->name }}</h1>
 @foreach($elem->attributs as $attribut)
 <p> {{ $attribut->name }}</p>
 <p> {{ $attribut->content}}</p>               
              
               
                
                
 @endforeach
 @endforeach
   