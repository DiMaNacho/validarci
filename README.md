# Validación de Cédula de Identidad Uruguaya:

##Sobre el proyecto:

Voy a tratar de incluir en este repositorio, la función en distintos lenguajes de programación, para que puedan validar correctamente una Cédula de Identidad Uruguaya.

Esto surge a raíz de encontrar trozos de código por internet en distintos lenguajes, y a partir de ahi pensar en armar algo definitivo y que pueda serle útil a mucha gente.

Estaría bueno que tratan de incoporar esto en sus proyectos, ya que es muy común que en sorteos, ecommerce u otros tipos de apps pidan la CI, pero siempre se mal acostumbró a solicitar solo números sin guiones ni puntos. Por esta razón, creo que es necesario tener un lugar donde poder simplemente copiar y pegar una simple función en tu lenguaje de desarrollo preferido y así ofrecer mejores soluciones.

Te invito a pushear mejoras o porteos a otros lenguajes, para tratar de armar un repo que sirva a mucha gente.

##Explicación:

En primer lugar vamos a validar la información ingresada por el usuario, dónde le damos la libertad de que ingrese con o sin puntos o guión, y funciona para cédulas comprendidas entre 100.000 y 9.999.999 (Las cédulas vigentes a la fecha).

Ej. aceptados con el documento **1.234.567-8**:
* 1.234.567-8
* 1.234.5678
* 1.2345678
* 12345678
* 1234.5678
* 1234.567-8
* 1234567-8
Ej. aceptados con el documento **123.456-7**:
* 123.456-7
* 123.4567
* 1234567
* 123.4567
* 123456-7

Luego utilizamos el algoritmo por el cual se asigna un número verificador para asegurarnos de que el documento ingresado sea real.

Breve explicación del cálculo:

>###Cálculo del Dígito Verificador Uruguayo
Se toman los 7 números de la cédula y se multiplican cada uno por 2987634 uno a uno el primer número por el 2, el segundo por el 9 y así sucesivamente, cuando cada resultado supera un dígito, se toma sólo la unidad.
Ej.:
C.I.: 1.234.567-X  -> 2987634 -> 2, 8, 4, 8, 0, 8, 8
Se hace la sumatoria de los resultados, en el ejemplo sería 2+8+4+8+0+8+8=38.
Se busca el primer número más grande que 38 que termina en cero y se le resta: 40-38= 2, (es lo mismo que 10-(38 mod 10)).
Es x=2 pues, el dígito verificador para la cédula 1.234.567.
Otra manera más simple de verlo es como un producto escalar de vectores en módulo 10. Las primeras 7 cifras de la cédula pueden verse como un vector de largo 7.
Ese vector es multiplicado escalarmente por el vector 8123476 obteniéndose un número N.
El dígito verificador resulta ser N módulo 10.
Ej.: C.I.: 1.234.567-X -> X = [(1×8)+(2×1)+(3×2)+(4×3)+(5×4)+(6×7)+(7×6)] mod 10 -> X = [8+2+6+12+20+42+42] mod 10 = 132 mod 10 = 2



Creador: *DiMaNacho* - [oBrusly! kung-Fu Digital](http://obrusly.com)

Créditos a *nprieto23* (código original del algoritmo para JS): [Algoritmo en JavaScript para validar el Documento de identidad Uruguayo](http://bit.ly/1CKYjKI)