TRANSPILADOR = scss
PARAMETROS = -w -t expanded
RUTA = styles/sass:styles/css

main:
	${TRANSPILADOR} ${PARAMETROS} ${RUTA}