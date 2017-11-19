# Establezca esto en la raíz de su proyecto cuando se despliegue.
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "img"
javascripts_dir = "js"

# Puede seleccionar su estilo de salida preferido aquí
# output_style = :expanded or :nested or :compact or :compressed
# output_style = :compressed # Produccion
output_style = :expanded # Desarrollo

# Para habilitar las rutas relativas via compass, descomentar.
# relative_assets = true

# Para deshabilitar los comentarios de depuración, descomentar.
# line_comments = false
line_comments = false

# Habilitar autoprefixer
require 'autoprefixer-rails'

on_stylesheet_saved do |file|
  css = File.read(file)
  map = file + '.map'

  if File.exists? map
    result = AutoprefixerRails.process(css,
      from: file,
      to:   file,
      map:  { prev: File.read(map), inline: false })
    File.open(file, 'w') { |io| io << result.css }
    File.open(map,  'w') { |io| io << result.map }
  else
    File.open(file, 'w') { |io| io << AutoprefixerRails.process(css) }
  end
end
