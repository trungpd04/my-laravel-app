<x-layout>
    <style>
        .chessboard-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 1rem;
        }

        .chessboard {
            display: grid;
            grid-template-columns: repeat({{ $n }}, 1fr);
            gap: 0;
            width: 100%;
            max-width: min(90vh, 90vw);
            margin: 0 auto;
            aspect-ratio: 1;
            border: 4px solid #2d3748;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            overflow: hidden;
        }

        .chessboard-cell {
            aspect-ratio: 1;
            width: 100%;
            height: 100%;
            transition: all 0.2s ease;
        }

        .chessboard-cell:hover {
            opacity: 0.8;
            transform: scale(0.95);
        }

        .white {
            background-color: #f0d9b5;
        }

        .black {
            background-color: #b58863;
        }

        @media (max-width: 640px) {
            .chessboard {
                max-width: 95vw;
                border-width: 2px;
            }
        }

        @media (max-width: 480px) {
            .chessboard-container {
                padding: 0.5rem;
            }
        }
    </style>

    <div class="chessboard-container">
        <div class="chessboard">
            @for ($i = 0; $i < $n; $i++)
                @for ($j = 0; $j < $n; $j++)
                    <div class="chessboard-cell {{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}"></div>
                @endfor
            @endfor
        </div>
    </div>
</x-layout>