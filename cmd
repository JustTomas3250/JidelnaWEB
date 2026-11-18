docker compose up --build

docker compose watch

docker stop $(docker ps -q)

npx @tailwindcss/cli -i ./src/public/tailwind/input.css -o ./src/public/style.css --watch
