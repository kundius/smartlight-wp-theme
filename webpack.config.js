const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const MinifyPlugin = require('babel-minify-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

const PATHS = {
    source: path.join(__dirname, 'src/'),
    build: path.join(__dirname, 'dist/')
}

module.exports = {
    entry: {
      main: [
        PATHS.source + 'sass/main.sass',
      ],
      about: [
        PATHS.source + 'sass/about.sass',
        PATHS.source + 'img/main-logo.png',
      ],
      contacts: [
        PATHS.source + 'sass/contacts.sass',
      ],
      prices: [
        PATHS.source + 'sass/prices.sass',
      ],
      projects: [
        PATHS.source + 'sass/projects.sass',
      ],
      articles: [
        PATHS.source + 'sass/articles.sass',
      ],
      common: [
        PATHS.source + 'js/common.js',
        PATHS.source + 'sass/common.sass',
        PATHS.source + 'img/sprite.svg',
        // PATHS.source + 'img/commercial.svg',
        // PATHS.source + 'img/houses.svg',
        // PATHS.source + 'img/apartments.svg',
        PATHS.source + 'img/logo.svg',
        PATHS.source + 'img/creator.png',

        PATHS.source + 'img/office-lighting.svg',
        PATHS.source + 'img/office-lighting.jpg',
        PATHS.source + 'img/lamp.svg',
        PATHS.source + 'img/cottage-lighting.svg',
        PATHS.source + 'img/cottage-lighting.jpg',
        PATHS.source + 'img/street-lighting.jpg',
        PATHS.source + 'img/advantages-0.svg',
        PATHS.source + 'img/advantages-1.svg',
        PATHS.source + 'img/advantages-2.svg',
        PATHS.source + 'img/advantages-3.svg',
        PATHS.source + 'img/advantages-4.svg',
        PATHS.source + 'img/partner-1.png',
        PATHS.source + 'img/partner-2.png',
        PATHS.source + 'img/partner-3.png',
        PATHS.source + 'img/partner-4.png',
        PATHS.source + 'img/partner-5.png',
        PATHS.source + 'img/partner-6.png',
        PATHS.source + 'img/scheme-1.svg',
        PATHS.source + 'img/scheme-2.svg',
        PATHS.source + 'img/scheme-3.svg',
        PATHS.source + 'img/scheme-4.svg',
        PATHS.source + 'img/scheme-5.svg',
      ]
    },

    output: {
        path: PATHS.build,
        publicPath: '/wp-content/themes/smartlight/dist/',
        filename: '[name].js',
        chunkFilename: '[name].js',
    },

    mode: process.env.NODE_ENV || 'development',

    resolve: {
      modules: [path.resolve(__dirname, 'src'), 'node_modules']
    },

    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.(css|sass|scss)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                    {
                      loader: 'sass-resources-loader',
                      options: {
                        resources: [
                          PATHS.source + 'sass/_functions.sass',
                          PATHS.source + 'sass/_variables.sass',
                          PATHS.source + 'sass/_mixins.sass'
                        ]
                      }
                    }
                ]
            },
            {
                test: /\.(png|jpg|gif|svg|webm|mp4|ogg|ogv)/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?[hash]',
                            outputPath: 'img/'
                        }
                    }
                ]
            },
            {
                test: /\.(eot|woff|woff2|ttf|otf)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?[hash]',
                            outputPath: 'fonts/'
                        }
                    }
                ]
            }
        ]
    },

    optimization: {
        minimizer: [
            new MinifyPlugin(),
            new OptimizeCSSAssetsPlugin()
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",
            chunkFilename: "[id].css"
        }),
    ]
};
