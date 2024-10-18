<p align="center"><img src="/art/logo.svg" alt="Logo"></p>

## Ducter Master Authentication Service

Es un servicio que permite la autenticacion a DMA, mediante un core interno.


## Guia para su implementación e instalación

```bash
# Agregar en archivo composer.json el paquete 
{
    ...
    "require": {
        "ducterdevs/dma-service": "dev-master"
    },
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ducterdevs/dma-service"
        }
    ],
    ...
    "minimum-stability": "dev",
    ...
}

# instalar o actualizar dependencias de composer
$ composer install

# Luego en el archvio .env del proyecto debes de agregar dos variables.
# DMA_BASE_URI - Aqui se debe especificar la uri de Ductermaster

# DMA_API_ENDPOINT - Aqui se establece el prefijo para la API

DMA_BASE_URI=
DMA_API_ENDPOINT="${DMA_BASE_URI}/api/v1"

```

## Contribución

Para el desarrollo e implementación se trabajaran dos ramas primincipales ***master*** y ***development***.

Por ejemplo la incidencia **Creación de repositorio y archivos iniciales** llevara el nombre de la rama como **gen-12-creacion-de-repositorio-y-archivos-iniciales**

En caso de trabajar una incidencia de suma importancia se creara sobre la carpeta dependiendo el tipo, por ejemplo:

- hotfix
- fix
- feature

Y se debe especificar, por ejemplo el nombre quedaria: **hotfix/error-en-campo-de-migracion**.

Todo cambio debera ser creado en una rama y no afectar a las principales ***master*** y ***development***, el flujo de trabajo es:

1. Crear la rama sobre  ***master***, que es la que contendra los ultimos cambios ya aprobados.
2. Para el commit o mensaje, como titulo se debe especificar lo mas importante, se puede hacer uso de emojis tales como: 🐛✨✅⚙❤️🚫❌⚠️➕🚩🚀⚡, de acuerdo a la identificacion de los cambios. esto con el motivo de poder entender los cambios nuevos.
3. Una vez realizados sus cambios se debe fusionar con ***development*** en donde se probara la funcionalidad.
4. Una vez aprobada el cambio en ***development*** se debe de crear el Pull request a ***master***.


## Código de conducta

- Los participantes serán tolerantes con los puntos de vista opuestos.
- Los participantes deben asegurarse de que su lenguaje y sus acciones estén libres de ataques personales y comentarios personales despectivos.
- Al interpretar las palabras y acciones de los demás, los participantes siempre deben asumir buenas intenciones.
- No se tolerará ningún comportamiento que pueda considerarse razonablemente acoso.

## Vulnerabilidades de seguridad

Si descubre una vulnerabilidad de seguridad dentro de la aplicación, debera crear una incidencia en el repositorio de [Github](https://github.com/ducterdevs/dma-service).

## Licencia

Es un software de código abierto con licencia [licencia MIT] (https://opensource.org/licenses/MIT) para uso exclusivo de **Ducter**.
