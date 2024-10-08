import svg4everybody from "svg4everybody";
import forEach from "lodash/forEach";
import throttle from "lodash/throttle";
import share from "share-buttons";
import "whatwg-fetch";

const isVisible = (elem) =>
  !!elem &&
  !!(elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length);

const easing = {
  // no easing, no acceleration
  linear: function (t) {
    return t;
  },
  // accelerating from zero velocity
  easeInQuad: function (t) {
    return t * t;
  },
  // decelerating to zero velocity
  easeOutQuad: function (t) {
    return t * (2 - t);
  },
  // acceleration until halfway, then deceleration
  easeInOutQuad: function (t) {
    return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
  },
  // accelerating from zero velocity
  easeInCubic: function (t) {
    return t * t * t;
  },
  // decelerating to zero velocity
  easeOutCubic: function (t) {
    return --t * t * t + 1;
  },
  // acceleration until halfway, then deceleration
  easeInOutCubic: function (t) {
    return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
  },
  // accelerating from zero velocity
  easeInQuart: function (t) {
    return t * t * t * t;
  },
  // decelerating to zero velocity
  easeOutQuart: function (t) {
    return 1 - --t * t * t * t;
  },
  // acceleration until halfway, then deceleration
  easeInOutQuart: function (t) {
    return t < 0.5 ? 8 * t * t * t * t : 1 - 8 * --t * t * t * t;
  },
  // accelerating from zero velocity
  easeInQuint: function (t) {
    return t * t * t * t * t;
  },
  // decelerating to zero velocity
  easeOutQuint: function (t) {
    return 1 + --t * t * t * t * t;
  },
  // acceleration until halfway, then deceleration
  easeInOutQuint: function (t) {
    return t < 0.5 ? 16 * t * t * t * t * t : 1 + 16 * --t * t * t * t * t;
  },
};

svg4everybody();

forEach(document.querySelectorAll(".js-header"), function (header) {
  let top = parseInt(window.getComputedStyle(header).getPropertyValue("top"));

  const scrollHandler = throttle(() => {
    if (window.pageYOffset > top) {
      header.classList.add("header_fixed");
    } else {
      header.classList.remove("header_fixed");
    }
  }, 10);

  window.addEventListener("scroll", scrollHandler);
});

forEach(document.querySelectorAll(".js-drawer"), function (drawer) {
  let toggle = document.querySelector(".js-drawer-toggle");
  let opened = false;

  const outsideClickListener = (e) => {
    if (!drawer.contains(e.target) && isVisible(drawer)) {
      close();
    }
  };

  const close = () => {
    drawer.classList.remove("header__drawer_opened");
    toggle.classList.remove("header__toggle_close");
    document.removeEventListener("click", outsideClickListener);
    opened = false;
  };

  const open = () => {
    drawer.classList.add("header__drawer_opened");
    toggle.classList.add("header__toggle_close");
    document.addEventListener("click", outsideClickListener);
    opened = true;
  };

  toggle.addEventListener("click", (e) => {
    e.stopPropagation();
    if (opened) {
      close();
    } else {
      open();
    }
  });

  forEach(drawer.querySelectorAll("[data-next]"), function (arrow) {
    arrow.addEventListener("click", () => {
      forEach(drawer.querySelectorAll(`[data-parent]`), (parent) => {
        if (parent.dataset.parent !== "root") {
          parent.classList.remove("header-drawer_opened");
        }
      });
      drawer
        .querySelector(`[data-parent="${arrow.dataset.next}"]`)
        .classList.add("header-drawer_opened");
    });
  });
});

const parseParams = (str) => {
  let arr = str.split(";").map((row) => row.trim());
  let params = {};
  forEach(arr, (row) => {
    let arr2 = row.split(":").map((row) => row.trim());
    if (arr2.length === 2) {
      params[arr2[0]] = arr2[1];
    }
  });
  return params;
};
class Timeline {
  constructor(params) {
    this.step = parseFloat(params.velocity) / 60;
  }

  promise = null;
  playing = false;
  acceleration = 0;
  queue = [];

  run = () => {
    if (!this.queue.length) {
      this.playing = false;
    } else {
      let item = this.queue[0];

      if (item.progress === 0 && typeof item.onStart === "function")
        item.onStart();

      item.progress += this.step + this.acceleration;
      if (item.progress > 1) item.progress = 1;

      item.callback(item.progress);
      // item.callback(easing.easeOutCubic(item.progress))

      if (item.progress === 1) {
        if (typeof item.onEnd === "function") item.onEnd();

        this.queue.shift();
      }

      requestAnimationFrame(this.run);
    }
  };
  add = (callback, params) => {
    this.queue.push({
      ...params,
      progress: 0,
      callback,
    });
    this.acceleration = this.step * this.queue.length - this.step;
  };
  play = () => {
    if (this.playing) return;
    this.playing = true;
    this.run();
  };
  destroy = () => {
    this.queue = [];
  };
}
forEach(document.querySelectorAll("[data-slider]"), function (slider) {
  const params = Object.assign(
    {
      vertical: false,
      velocity: 1,
      span: 1,
    },
    parseParams(slider.dataset.slider)
  );

  let elItems = slider.querySelectorAll("[data-slider-item]");
  let elWrapper = slider.querySelector("[data-slider-wrapper]");
  let controls = slider.querySelectorAll("[data-slider-control]");
  let active = 0;
  let timeline = new Timeline(params);
  let prevElements = [];
  let nextElements = [];
  let dotElements = [];

  forEach(controls, (control) => {
    if (control.dataset.sliderControl == "previous") {
      prevElements.push(control);
    }
    if (control.dataset.sliderControl == "next") {
      nextElements.push(control);
    }
    if (
      !isNaN(parseFloat(control.dataset.sliderControl)) &&
      isFinite(control.dataset.sliderControl)
    ) {
      dotElements.push(control);
    }
  });

  forEach(prevElements, (el) => el.addEventListener("click", () => previous()));
  forEach(nextElements, (el) => el.addEventListener("click", () => next()));
  forEach(dotElements, (el) =>
    el.addEventListener("click", () => show(el.dataset.sliderControl))
  );

  const previous = () => {
    if (active === (active - params.span + elItems.length) % elItems.length) {
      return;
    }
    for (let i = 0; i < params.span; i++) {
      move((active - 1 + elItems.length) % elItems.length, 1);
    }
  };

  const next = () => {
    if (active === (active + params.span) % elItems.length) {
      return;
    }
    for (let i = 0; i < params.span; i++) {
      move((active + 1) % elItems.length, -1);
    }
  };

  const show = (index) => {
    if (active === index) {
      return;
    }
    let span = Math.abs(index - active);
    if (index > active) {
      for (let i = 0; i < span; i++) {
        move((active + 1) % elItems.length, -1);
      }
    }
    if (index < active) {
      for (let i = 0; i < span; i++) {
        move((active - 1 + elItems.length) % elItems.length, 1);
      }
    }
  };

  const move = (index, dir) => {
    let retreat = active;
    active = parseInt(index);

    let callback = (retreat, active, progress) => {
      forEach(dotElements, (dot) => {
        dot.classList.remove("_active");
        if (dot.dataset.sliderControl == active) {
          dot.classList.add("_active");
        }
      });

      forEach(elItems, (slide, i) => {
        if (dir < 0) {
          if (i === retreat) {
            slide.style.order = -1;
          }
          if (i > retreat) {
            slide.style.order = null;
          }
          if (i < retreat) {
            slide.style.order = 1;
          }
        } else {
          if (i === active) {
            slide.style.order = -2;
          }
          if (i > active) {
            slide.style.order = -1;
          }
          if (i < active) {
            slide.style.order = null;
          }
        }
      });

      if (params.vertical) {
        let height =
          dir < 0
            ? elItems[retreat].offsetHeight
            : elItems[active].offsetHeight;
        let y = dir < 0 ? height * progress : height - height * progress;
        elWrapper.style.transform = `translate3d(0px, -${y}px, 0px)`;
      } else {
        let width =
          dir < 0 ? elItems[retreat].offsetWidth : elItems[active].offsetWidth;
        let x = dir < 0 ? width * progress : width - width * progress;
        elWrapper.style.transform = `translate3d(-${x}px, 0px, 0px)`;
      }
    };
    timeline.add(callback.bind(this, retreat, active), {
      onStart: slider.dispatchEvent(
        new CustomEvent("slide.start", { detail: { retreat, active } })
      ),
      onEnd: slider.dispatchEvent(
        new CustomEvent("slide.end", { detail: { retreat, active } })
      ),
    });
    timeline.play();
  };

  move(active, 1);

  slider.slider = { previous, next, show };
});

forEach(document.querySelectorAll(".js-img-to-svg"), function (img) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const div = document.createElement("div");
      div.innerHTML = this.responseText;
      const svg = div.querySelector("svg");
      img.parentNode.insertBefore(svg, img.nextSibling);
      img.parentNode.removeChild(img);
    }
  };
  xhttp.open("GET", img.src, true);
  xhttp.send();
});

forEach(document.querySelectorAll(".js-main-projects"), function (projects) {
  let prev = projects.querySelector(".js-main-projects-prev");
  let next = projects.querySelector(".js-main-projects-next");
  let items = projects.querySelectorAll(".js-main-projects-item");
  let page = 1;
  let limit = window.matchMedia("(max-width: 960px)").matches ? "18" : "16";
  let pages = Math.ceil(items.length / limit);

  const isVisible = (i) => {
    return i >= limit * page - limit && i < limit * page;
  };
  const show = (index) => {
    page = index;
    forEach(items, (item, i) => {
      if (isVisible(i)) {
        item.classList.add("_visible");
      } else {
        item.classList.remove("_visible");
      }
    });
  };
  const nextHandler = () => {
    show(page === pages ? 1 : page + 1);
  };
  const prevHandler = () => {
    show(page === 1 ? pages : page - 1);
  };

  show(1);

  prev.addEventListener("click", prevHandler);
  next.addEventListener("click", nextHandler);
});

forEach(document.querySelectorAll(".js-scroll"), function (el) {
  const header = document.querySelector(".js-header");
  let top = 0;
  let left = 0;
  if (el.dataset.target) {
    let target = document.querySelector(el.dataset.target);
    if (target) {
      top = target.offsetTop - header.offsetHeight;
    }
  }
  el.addEventListener("click", () => {
    window.scroll({
      top,
      left,
      behavior: "smooth",
    });
  });
});

forEach(document.querySelectorAll(".js-masonry-grid"), function (grid) {
  for (let i = 0; i < grid.children.length; i++) {
    let item = grid.children[i];
    let paddingTop = parseInt(
      window.getComputedStyle(item).getPropertyValue("padding-top")
    );
    let found = null;
    for (let k = 0; k < i; k++) {
      if (grid.children[k].offsetLeft === item.offsetLeft) {
        found = grid.children[k];
      }
    }
    if (found) {
      let cellHeight = found.getBoundingClientRect().height;
      let contentHeight = found.children[0].getBoundingClientRect().height;
      if (contentHeight < cellHeight) {
        item.style.marginTop = `-${cellHeight - contentHeight - paddingTop}px`;
      }
    }
  }
});

forEach(document.querySelectorAll(".js-sticky-action"), function (el) {
  let close = el.querySelector(".js-sticky-action-close");
  close.addEventListener("click", () => {
    el.classList.add("_hidden");
  });
});

forEach(document.querySelectorAll(".js-cube"), function (cube) {
  let offset = (cube.offsetWidth * 0.82) / 2;
  let front = cube.querySelector(".js-cube-front");
  let back = cube.querySelector(".js-cube-back");

  cube.style.transform = `translateZ(-${offset}px)`;
  front.style.transform = `translateZ(${offset}px)`;
  back.style.transform = `translateY(-${offset}px) rotateX(90deg)`;

  cube.addEventListener("mouseenter", () => {
    cube.style.transform = `rotateX(-90deg) translateY(${offset}px)`;
  });
  cube.addEventListener("mouseleave", () => {
    cube.style.transform = `translateZ(-${offset}px)`;
  });
});

forEach(document.querySelectorAll("[data-project]"), function (button) {
  let id = button.dataset.project;
  let action = "get_project";

  button.addEventListener("click", (e) => {
    e.preventDefault();

    let modal = document.createElement("div");
    modal.classList.add("modal-project");
    let overlay = document.createElement("div");
    overlay.classList.add("modal-project__overlay");
    let close = document.createElement("button");
    close.classList.add("modal-project__close");
    let body = document.createElement("div");
    body.classList.add("modal-project__body");
    let details = document.createElement("div");
    details.classList.add("project-details");
    let gallery = document.createElement("div");
    gallery.classList.add("project-details__gallery");
    let info = document.createElement("div");
    info.classList.add("project-details__info");
    let title = document.createElement("div");
    title.classList.add("project-details__title");
    let desc = document.createElement("div");
    desc.classList.add("project-details__desc");

    info.appendChild(title);
    info.appendChild(desc);
    details.appendChild(gallery);
    details.appendChild(info);
    body.appendChild(details);
    modal.appendChild(overlay);
    modal.appendChild(close);
    modal.appendChild(body);

    document.body.appendChild(modal);
    close.addEventListener("click", () => {
      modal.parentElement.removeChild(modal);
    });
    overlay.addEventListener("click", () => {
      modal.parentElement.removeChild(modal);
    });

    let formData = new FormData();
    formData.append("id", id);
    formData.append("action", action);
    fetch(myajax.url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((json) => {
        title.innerHTML = json.post.post_title;
        desc.innerHTML = json.post.post_excerpt;
        for (const img of json.gallery) {
          let image = document.createElement("img");
          image.classList.add("project-details__image");
          image.src = img.url;
          gallery.appendChild(image);
        }
      });
  });
});

function initModal(button, target) {
  let close = target.querySelector("[data-modal-close]");
  let formName = target.querySelector('[name="form"]');
  let modalTitle = target.querySelector('.modal__title');
  const outsideClickListener = (event) => {
    if (
      !target.contains(event.target) &&
      isVisible(target) &&
      !button.contains(event.target)
    ) {
      hide();
      removeClickListener();
    }
  };
  const removeClickListener = () => {
    document.removeEventListener("click", outsideClickListener);
  };
  const show = () => {
    target.classList.add("_opened");
    if (formName) {
      formName.value = button.dataset.modalForm
        ? button.dataset.modalForm
        : "Форма в модальном окне";
    }
    if (modalTitle) {
      if (!modalTitle.dataset.defaultTitle) {
        modalTitle.dataset.defaultTitle = modalTitle.innerHTML
      }
      modalTitle.innerHTML = button.dataset.modalTitle || modalTitle.dataset.defaultTitle
    }
    document.addEventListener("click", outsideClickListener);
  };
  const hide = () => {
    target.classList.remove("_opened");
  };
  button.addEventListener("click", show);
  close.addEventListener("click", hide);
}

forEach(document.querySelectorAll("[data-modal]"), function (button) {
  let modal = document.querySelector(button.dataset.modal);
  initModal(button, document.querySelector(button.dataset.modal));
});

forEach(document.querySelectorAll(".js-form"), (form) => {
  let controls = form.querySelectorAll("span.wpcf7-form-control-wrap");
  let messages = [];
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    forEach(controls, (el) => el.classList.remove("_validation-error"));

    forEach(messages, (message) => {
      if (message.parentNode) {
        message.parentNode.removeChild(message);
      }
    });
    messages = [];

    fetch(form.action, {
      method: "POST",
      body: new FormData(form),
    })
      .then((response) => response.json())
      .then((response) => {
        const showError = (el, text) => {
          el.classList.add("_validation-error");
          const message = document.createElement("span");
          message.classList.add("ui-form-error");
          message.innerHTML = text;
          messages.push(message);
          el.appendChild(message);
          const close = document.createElement("span");
          close.classList.add("ui-form-error__close");
          message.appendChild(close);
          close.addEventListener("click", (e) => {
            e.stopPropagation();
            message.parentNode.removeChild(message);
          });
        };

        if (response.status == "mail_sent") {
          if (typeof ym === "function") {
            ym(56370736, "reachGoal", "TARGET");
          }
          form.reset();
          form.classList.add("_validation-mail_sent");
          setTimeout(() => {
            form.classList.remove("_validation-mail_sent");
          }, 5000);
        }

        if (
          response.status == "acceptance_missing" ||
          response.status == "mail_failed"
        ) {
          showError(
            form.querySelector(".wpcf7-form-control-wrap.submit"),
            response.message
          );
        }

        if (response.status == "validation_failed") {
          forEach(response.invalidFields, (field) => {
            showError(form.querySelector(field.into), field.message);
          });
        }
      });
  });
});

const callOrModalButtons = document.querySelectorAll(".js-call-or-modal");
if (callOrModalButtons.length) {
  callOrModalButtons.forEach((button) => {
    if (window.matchMedia("(min-width: 768px)").matches) {
      initModal(button, document.querySelector(button.dataset.target));
    } else {
      button.addEventListener("click", () => {
        window.location.href = `tel:${button.dataset.tel}`;
      });
    }
  });
}
