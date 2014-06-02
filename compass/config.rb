# Require any additional compass plugins here.
# -----------------------------------------------------------------------------
project_path = File.expand_path("..",File.dirname(__FILE__))


# Set this to the root of your project when deployed:
# -----------------------------------------------------------------------------

http_path = "/"
css_dir = "_/css"
sass_dir = "_/css"
images_dir = "_/img"
javascripts_dir = "_/js"
svg_dir = "_/svg"
fonts_dir = "_/fonts"

# Output style and comments
# -----------------------------------------------------------------------------

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
# Over-ride with force compile to change output style with: compass compile --output-style compressed --force
output_style = :expanded

line_comments = false
cache = true
color_output = false # required for Mixture

require 'sass-globbing'


# SASS core
# -----------------------------------------------------------------------------

# Chrome needs a precision of 7 to round properly
Sass::Script::Number.precision = 7