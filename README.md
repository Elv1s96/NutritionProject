## О чем проект :
Тестовый сайт по контролю питания , написаный на laravel с использованием Vue.js и Vuetify

## Дополнительные возможности:
На сайте есть два лайв чата. Один работает с помощью Redis сервера, а второй с помощью laravel echo server.
Чтобы они заработали надо:
- В файле boostrap.js раскомментировать строки 1-2 и 49-54;
- Запустить Redis server;
- Запустить файл server.js командой node server.js;
- Запустить laravel echo server командой laravel-echo-server start(для windows npx laravel-echo-server-start)

