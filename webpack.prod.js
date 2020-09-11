/* eslint-disable */
const fs = require("fs");
const path = require("path");
const common = require("./webpack.config");
const { merge } = require("webpack-merge");

module.exports = () => {
  // const generateVersionedCSS = () => {
  //   const dateString = new Date().toISOString().replace(/[-:.TZ]/g, "");

  //   let file = fs.readFileSync(path.join(".", "style.css"));
  //   file = file.toString().replace(/<\$VERSION\$>/g, dateString);
  //   fs.writeFileSync(path.join("..", "style.css"), file);
  // };

  // generateVersionedCSS();

  const config = merge(common, {
    mode: "production",
    module: {
      rules: [
        // {
        //   test: /\.(jpe?g|png|gif|svg)$/i,
        //   use: [
        //     {
        //       loader: "kraken-loader",
        //       options: {
        //         secret: "59e2f4202e04bf55955d938055fd2bae6fa15f15",
        //         silent: false,
        //         lossy: false,
        //         key: "6f110caf166a4e6760b90eb8e3befc22",
        //       },
        //     },
        //   ],
        // },
      ],
    },
  });
  return config;
};