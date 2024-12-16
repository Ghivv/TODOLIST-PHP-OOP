<?php

namespace View {
    use Service\TodolistService;
    use Helper\inputHelper;

    class TodolistView
    {
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService) 
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodolist();

                echo "Menu" . PHP_EOL;
                echo "1. Tambah Todolist" . PHP_EOL;
                echo "2. Hapus Todolist" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;

                $pilihan = inputHelper::input("pilih");

                if ($pilihan == "1") {
                    $this->addTodolist();
                } elseif ($pilihan == "2") {
                    $this->removeTodolist();
                } elseif ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" . PHP_EOL;
                }
            }

            echo "Sampai Jumpa lagi" . PHP_EOL;
        }

        function addTodolist(): void
        {
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = inputHelper::input("Todo (x untuk batal)");

            if ($todo == "x") {
                echo "Batal menambahkan todo" . PHP_EOL;
            } else {
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "MENGHAPUS TODO" . PHP_EOL;

            $pilihan = inputHelper::input("Nomor (x untuk batalkan)");

            if ($pilihan == "x") {
                echo "Batal menghapus todo" . PHP_EOL;
            } else {
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}
?>