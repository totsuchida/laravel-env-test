# laravel-env-test

.envのテストのために作ったリポジトリ

## 作り方

1. ディレクトリ構成を作り、以下のコマンドを実行する。


  - ディレクトリ構成
    - ```
      laravel-env-test/
      ├── docker-compose.yml
      ├── Dockerfile
      └── src/             ← Laravelアプリ（初期状態で空の状態じゃないと初期セットアップコマンド失敗する）
      ```
  - `docker compose run --rm laravel composer create-project laravel/laravel . --prefer-dist`
  - 成功すると初期設定ファイルが格納される
2. .envを編集する
  - src/.envに以下を追記する
  - `TEST_VALUE=`
3. テストコードを追加する(routes/web.php)
  - ```
    use Illuminate\Support\Facades\Route;
    Route::get('/', function () {
        return response()->json([
            'env(TEST_VALUE)' => env('TEST_VALUE', 'default'),
            'env(TEST_VALUE) ?: "default"' => env('TEST_VALUE') ?: 'default',
        ]);
    });

    ```
4. 起動する
  - `docker compose up`
5. ブラウザで確認する
  - http://localhost:8000 にアクセスすると、以下のようなJSONが表示される
  - `{"env(TEST_VALUE)": "","env(TEST_VALUE) ?: \"default\"": "default"}
