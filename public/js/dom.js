const $dom = (selector, { context = document, many = false } = {}) => {
    const els = context[many ? "querySelectorAll" : "querySelector"](selector);
    return many ? Array.from(els) : els;
};

const $event = (element) => ({
    add: (events, callback, option = {}) => {
        events.split(" ").forEach(event => element.addEventListener(event, callback, option));
        return $event(element);
    },
    del: (events, callback, option = {}) => {
        events.split(" ").forEach(element.removeEventListener(event, callback, option));
        return $event(element);
    }
});

const $prop = (element) => ({
    has: (property) => element.hasAttribute(property),
    get: (...properties) => {
        if (properties.length === 1) {
            return element.getAttribute(properties[0]);
        } else if (properties.length > 1) {
            const result = {};
            properties.forEach(prop => {
                result[prop] = element.getAttribute(prop);
            });
            return result;
        }
        return null;
    },
    add: (property, value) => {
        if (typeof property === "object" && value === undefined) {
            Object.entries(property).forEach(([key, val]) => {
                element.setAttribute(key, val || "");
            });
        } else {
            element.setAttribute(property, value);
        }
        return $prop(element);
    },
    del: (...properties) => {
        properties.forEach(property => element.removeAttribute(property));
        return $prop(element);
    }
});

const $style = (element) => ({
    has: (property) => getComputedStyle(element)[property] !== "",
    get: (...properties) => {
        const computed = getComputedStyle(element);
        if (properties.length === 1) return computed[properties[0]];
        if (properties.length > 1) {
            const result = {};
            properties.forEach(prop => result[prop] = computed[prop]);
            return result;
        }
        return null;
    },
    add: (property, value) => {
        if (typeof property === "object" && value === undefined) {
            Object.entries(property).forEach(([key, val]) => element.style[key] = val);
        } else {
            element.style[property] = value;
        }
        return $style(element);
    },
    del: (...properties) => {
        properties.forEach(prop => element.style[prop] = "");
        return $style(element);
    }
});

const $class = (element) => ({
    has: (property) => element.classList.contains(property),
    add: (...properties) => {
        element.classList.add(...properties);
        return $class(element);
    },
    del: (...properties) => {
        element.classList.remove(...properties);
        return $class(element);
    },
    swp: (...properties) => {
        properties.forEach(prop => element.classList.toggle(prop));
        return $class(element);
    }
});