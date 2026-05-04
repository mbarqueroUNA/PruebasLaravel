pipeline {
    agent any

    environment {
        RENDER_DEPLOY_HOOK = credentials('render-deploy-hook')
    }

    stages {

        stage('Preparar entorno Laravel') {
            steps {
                bat 'copy .env.example .env'
                bat 'php artisan key:generate'
            }
        }

        stage('Instalar dependencias') {
            steps {
                bat 'composer install --no-interaction'
            }
        }

        
        stage('Ejecutar pruebas') {
            steps {
                bat 'php artisan test'
            }
        }


        stage('Ejecutar pruebas') {
            steps {
                bat 'php artisan test'
            }
        }
    }


    post {
        success {
            mail to: 'michael.barquero.salazar@una.cr',
                subject: "✅ CI PASÓ - ${env.JOB_NAME}",
                body: "Las pruebas pasaron correctamente."
        }
        failure {
            mail to: 'michael.barquero.salazar@una.cr',
                subject: "❌ CI FALLÓ - ${env.JOB_NAME}",
                body: "Las pruebas fallaron."
        }
    }

/*
    post {
        success {
            echo '✅ Pruebas pasaron: desplegando a Render'
            bat "curl -X POST %RENDER_DEPLOY_HOOK%"

            mail to: 'michael.barquero.salazar@una.cr',
                 subject: "✅ CI PASÓ Y SE DESPLEGÓ - ${env.JOB_NAME}",
                 body: """\
Las pruebas pasaron correctamente.

Proyecto: ${env.JOB_NAME}
Build: #${env.BUILD_NUMBER}

El cambio fue desplegado automáticamente en Render.
"""
        }

        failure {
            echo '❌ Pruebas fallaron: NO se despliega'

            mail to: 'michael.barquero.salazar@una.cr',
                 subject: "❌ CI FALLÓ - ${env.JOB_NAME}",
                 body: """\
Las pruebas fallaron.

Proyecto: ${env.JOB_NAME}
Build: #${env.BUILD_NUMBER}

El cambio NO fue desplegado.
"""
        }
    }*/
}
