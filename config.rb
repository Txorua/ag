environment = :development

css_dir = "assets/css"
sass_dir = "scss"
javascripts_dir = "assets/js"
fonts_dir = "assets/fonts"
images_dir = "assets/images"

require 'compass'
require 'bootstrap-sass'

asset_cache_buster :none
output_style = (environment == :development) ? :expanded : :compressed
relative_assets = true
line_comments = (environment == :development) ? true : false

Sass::Script::Number.precision = 5
