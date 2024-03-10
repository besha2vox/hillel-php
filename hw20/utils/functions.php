<?php

function isFieldValid($field): bool
{
    return gettype($field) === 'string';
}

function isScalarValueValid($value): bool
{
    return gettype($value) === 'string'
        || gettype($value) === "integer"
        || gettype($value) === "double";
}

function createValue(string|int|float $value): string|int|float
{
    if (gettype($value) === 'string') {
        return "'" . $value . "'";
    }
    return $value;
}

function mapValues(array $values): string
{
    return '(' . implode(', ', array_map('createValue', $values)) . ')';
}

function createQueryValues(array $values, string $fieldType): string
{
    if (is_array($values[0]) || ($fieldType === 'string' && !is_array($values[0]))) {
        return '(' . implode(', ', array_map('mapValues', $values)) . ')';
    }

    return mapValues($values);
}


function validateFieldsAndValues(array|string $fields, array|string $values,): void
{
    if (gettype($fields) === 'string' && !is_array($fields)) {
        throw new Exception(
            'The type of the $fields argument must be a string or array'
        );
    }

    if (is_array($fields) && is_array($values)) {
        if (is_array($values[0])) {
            foreach ($values as $innerValues) {
                if (count($fields) !== count($innerValues)) {
                    throw new Exception(
                        'The number of values of the $fields argument must match the number of inner values of the $values argument'
                    );
                }
            }
        }

        if (count($fields) !== count($values)) {
            throw new Exception(
                'The number of values of the $fields argument must match the number of values of the $values argument'
            );
        }

        for ($i = 0; $i < count($fields); $i++) {
            if (!isFieldValid($fields[$i]) || !isScalarValueValid($values[$i])) {
                throw new Exception(
                    'The type of each $fields value must be a string, the type of each $values value must be a string, int or float'
                );
            }
        }
    }
}

function createUpdateQueryString(string $key, string|int|float $value) {
    return "$key = " . (gettype($value) === 'string' ? "'$value'" : $value);
}

function createJoinQueryString(string $key, string|int|float $value) {
    return "$key = " . (gettype($value) === 'string' ? "'$value'" : $value);
}