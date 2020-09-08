# Aleks Pawlik Photography Portfolio

## Layout

These are laid out differently to gulp builds, there are two special folders for source assets -

`icons folder`
contains svgs that should be combined in to a single spritemap svg in dist

`assets folder`
this should hold things that aren’t referenced else where but need to be copied to the dist folder, it maintains the directory structure when copied to dist, with things in the root of assets being in the root of dist

good examples of things that should be in assets are index.html, static assets that are available via download links, such as pdfs etc.

things that shouldn’t be in assets, anything referenced by SCSS, such as fonts, background images etc., as this will lead to duplicate assets in the dist folder

---

Anything that is referenced directly by SCSS needs to be outside these folders, an `images` folder to hold background images etc., and a `fonts` folder to hold fonts for example.

In SCSS the content of these folders should be pathed from the `styles.scss` in `src / scss`, rather than the partial they appear in, eg

image url

>`background-image: url('../../images/bg-hero.jpg');`

font url

>`src: url('../../fonts/Comic Sans MS.ttf') format('truetype');`

These paths remain constant, regardless of which partial they are used in, or which subfolder that partial may be in.

## Sprites

To use sprites in `svg` elements, make sure the SVG has been added to the spritemap, and use the following:

>`<svg>`
>`    <use xlink:href="#sprite-facebook"></use>`
>`</svg>`

To use sprites in pseudo elements, first import the auto generated sprite styles

>`@import '~svg-spritemap-webpack-plugin/sprites';`

Note - this path and filename are constant as it references `node_modules`

then use the mixin and map to get the sprite

>`&::before {`
>`    @include sprite('facebook');`
>`    background-image: url(map-get($sprites, 'facebook'));`
>`}`

## Set Up

### Set up - install dependencies

>`npm install`

## Dev

Build Only - To only build, lint and watch, no live server, you can use the following command

>`npm start`

Stand Alone Lint - This will run a lint over all source files ( JSX ) in the src/js folder ( eslint )

>`npm run lint`

## Builds

Build - This will build the project and write the files to the dist folder, it's set to do a production build, so output will be uglified.

>`npm run build`
