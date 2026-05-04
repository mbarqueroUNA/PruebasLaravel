pipeline {
    agent any

    stages {

        stage('Instalar dependencias') {
            steps {
                sh 'composer install --no-interaction'
            }
        }

        stage('Ejecutar pruebas') {
            steps {
                sh 'php artisan test'
            }
        }
    }

    post {
        success {
            echo '✅ Pruebas pasaron: se autoriza despliegue'
        }
        failure {
            echo '❌ Pruebas fallaron: NO se despliega'
        }
    }
}