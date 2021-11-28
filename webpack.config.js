const path = require("path");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

const PATHS = {
  source: path.join(__dirname, "src/"),
  build: path.join(__dirname, "dist/"),
};

module.exports = {
  entry: {
    main: [PATHS.source + "sass/main.sass"],
    about: [
      PATHS.source + "sass/about.sass",
      PATHS.source + "img/main-logo.png",
    ],
    contacts: [PATHS.source + "sass/contacts.sass"],
    prices: [PATHS.source + "sass/prices.sass"],
    projects: [PATHS.source + "sass/projects.sass"],
    articles: [PATHS.source + "sass/articles.sass"],
    article: [PATHS.source + "sass/article.sass"],
    project: [
      PATHS.source + "js/project.js",
      PATHS.source + "sass/project.sass",
    ],
    servicePrime: [PATHS.source + "sass/servicePrime.sass"],
    serviceMesozoic: [PATHS.source + "sass/serviceMesozoic.sass"],
    serviceCharlie: [PATHS.source + "sass/serviceCharlie.sass"],
    serviceDelta: [PATHS.source + "sass/serviceDelta.sass"],
    sitemap: [
      PATHS.source + "js/sitemap.js",
      PATHS.source + "sass/sitemap.sass",
    ],
    quiz: [PATHS.source + "js/quiz.js", PATHS.source + "sass/quiz.sass"],
    common: [
      PATHS.source + "js/common.js",
      PATHS.source + "sass/common.sass",
      PATHS.source + "img/sprite.svg",
      // PATHS.source + 'img/commercial.svg',
      // PATHS.source + 'img/houses.svg',
      // PATHS.source + 'img/apartments.svg',
      PATHS.source + "img/logo.svg",
      PATHS.source + "img/creator.png",

      PATHS.source + "img/office-lighting.svg",
      PATHS.source + "img/office-lighting.jpg",
      PATHS.source + "img/lamp.svg",
      PATHS.source + "img/cottage-lighting.svg",
      PATHS.source + "img/cottage-lighting.jpg",
      PATHS.source + "img/street-lighting.jpg",
      PATHS.source + "img/advantages-0.svg",
      PATHS.source + "img/advantages-1.svg",
      PATHS.source + "img/advantages-2.svg",
      PATHS.source + "img/advantages-3.svg",
      PATHS.source + "img/advantages-4.svg",
      PATHS.source + "img/partner-1.png",
      PATHS.source + "img/partner-2.png",
      PATHS.source + "img/partner-3.png",
      PATHS.source + "img/partner-4.png",
      PATHS.source + "img/partner-5.png",
      PATHS.source + "img/partner-6.png",
      PATHS.source + "img/scheme-1.svg",
      PATHS.source + "img/scheme-2.svg",
      PATHS.source + "img/scheme-3.svg",
      PATHS.source + "img/scheme-4.svg",
      PATHS.source + "img/scheme-5.svg",
    ],
  },

  output: {
    path: PATHS.build,
    publicPath: "/wp-content/themes/smartlight/dist/",
    filename: "[name].js",
    chunkFilename: "[name].js",
  },

  mode: process.env.NODE_ENV || "development",

  resolve: {
    modules: [path.resolve(__dirname, "src"), "node_modules"],
  },

  module: {
    rules: [
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.(css|sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
          {
            loader: "sass-resources-loader",
            options: {
              resources: [
                PATHS.source + "sass/_functions.sass",
                PATHS.source + "sass/_variables.sass",
                PATHS.source + "sass/_mixins.sass",
              ],
            },
          },
        ],
      },
      {
        test: /\.(png|jpg|gif|svg|webm|mp4|ogg|ogv)/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]?[hash]",
              outputPath: "img/",
            },
          },
        ],
      },
      {
        test: /\.(eot|woff|woff2|ttf|otf)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]?[hash]",
              outputPath: "fonts/",
            },
          },
        ],
      },
    ],
  },

  plugins: [
    new webpack.ProgressPlugin(),
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name].css",
      chunkFilename: "[id].css",
    }),
  ],
};
